<?php

namespace App\Livewire\Settings;

use App\Livewire\Concerns\HasToast;
use App\Models\Faculty;
use App\Models\Institution;
use App\Models\StudyProgram;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileForm extends Component
{
    use HasToast, WithFileUploads;

    public string $name = '';

    public string $email = '';

    public $photo;

    // Identity fields
    public string $identity_id = '';

    public string $type = '';

    public string $sinta_id = '';

    public string $scopus_id = '';

    public string $google_scholar_id = '';

    public string $wos_id = '';

    public string $address = '';

    public string $title_prefix = '';

    public string $title_suffix = '';

    public string $birthdate = '';

    public string $birthplace = '';

    public mixed $institution_id = null;

    public ?int $faculty_id = null;

    public ?int $study_program_id = null;

    public int $scopus_h_index = 0;

    public int $gs_h_index = 0;

    public int $wos_h_index = 0;

    public array $institutions = [];

    public array $faculties = [];

    public array $studyPrograms = [];

    /**
     * Mount the component.
     */
    public function mount(): void
    {
        $user = Auth::user();

        // Load basic user data
        $this->name = $user->name;
        $this->email = $user->email;

        // Load identity data
        if ($user->identity) {
            $this->identity_id = $user->identity->identity_id ?? '';
            $this->type = $user->identity->type ?? '';
            $this->sinta_id = $user->identity->sinta_id ?? '';
            $this->scopus_id = $user->identity->scopus_id ?? '';
            $this->google_scholar_id = $user->identity->google_scholar_id ?? '';
            $this->wos_id = $user->identity->wos_id ?? '';
            $this->title_prefix = $user->identity->title_prefix ?? '';
            $this->title_suffix = $user->identity->title_suffix ?? '';
            $this->address = $user->identity->address ?? '';
            $this->birthdate = $user->identity->birthdate?->format('Y-m-d') ?? '';
            $this->birthplace = $user->identity->birthplace ?? '';
            $this->institution_id = $user->identity->institution_id;
            $this->faculty_id = $user->identity->faculty_id;
            $this->study_program_id = $user->identity->study_program_id;
            $this->scopus_h_index = $user->identity->scopus_h_index ?? 0;
            $this->gs_h_index = $user->identity->gs_h_index ?? 0;
            $this->wos_h_index = $user->identity->wos_h_index ?? 0;
        }

        // Load institutions for dropdown
        $this->institutions = Institution::orderBy('name')->get()->toArray();

        // Load faculties based on selected institution
        if ($this->institution_id) {
            $this->faculties = Faculty::where('institution_id', $this->institution_id)
                ->orderBy('name')
                ->get()
                ->toArray();
        }

        // Load study programs based on selected faculty
        if ($this->faculty_id) {
            $this->studyPrograms = StudyProgram::where('faculty_id', $this->faculty_id)
                ->orderBy('name')
                ->get()
                ->toArray();
        } elseif ($this->institution_id) {
            $this->studyPrograms = StudyProgram::where('institution_id', $this->institution_id)
                ->orderBy('name')
                ->get()
                ->toArray();
        }
    }

    /**
     * Updated institution.
     */
    public function updatedInstitutionId(): void
    {
        $this->faculty_id = null;
        $this->study_program_id = null;
        $this->faculties = Faculty::where('institution_id', $this->institution_id)
            ->orderBy('name')
            ->get()
            ->toArray();
        $this->studyPrograms = [];
    }

    /**
     * Updated faculty.
     */
    public function updatedFacultyId(): void
    {
        $this->study_program_id = null;
        $this->studyPrograms = StudyProgram::where('faculty_id', $this->faculty_id)
            ->orderBy('name')
            ->get()
            ->toArray();
    }

    /**
     * Update the profile information for the currently authenticated user.
     */
    public function updateProfileInformation(): void
    {
        $user = Auth::user();

        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],
            'identity_id' => ['required', 'string', 'max:255'],
            'type' => [
                Auth::user()->hasAnyRole(['superadmin', 'admin lppm', 'reviewer']) ? 'nullable' : 'required',
                Rule::in(['dosen', 'mahasiswa', 'reviewer']),
            ],
            'sinta_id' => ['nullable', 'string', 'max:255'],
            'scopus_id' => ['nullable', 'string', 'max:255'],
            'google_scholar_id' => ['nullable', 'string', 'max:255'],
            'wos_id' => ['nullable', 'string', 'max:255'],
            'title_prefix' => ['nullable', 'string', 'max:255'],
            'title_suffix' => ['nullable', 'string', 'max:255'],
            'address' => ['nullable', 'string'],
            'birthdate' => ['nullable', 'date'],
            'birthplace' => ['nullable', 'string', 'max:255'],
            'institution_id' => ['nullable'], // Bisa ID atau Nama Baru
            'faculty_id' => ['nullable', 'exists:faculties,id'],
            'study_program_id' => ['nullable', 'exists:study_programs,id'],
            'scopus_h_index' => ['nullable', 'integer', 'min:0'],
            'gs_h_index' => ['nullable', 'integer', 'min:0'],
            'wos_h_index' => ['nullable', 'integer', 'min:0'],
            'photo' => ['nullable', 'image', 'max:1024'],
        ]);

        // Update user data
        $user->fill([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        if ($this->photo) {
            $user->addMedia($this->photo->getRealPath())
                ->usingFileName($this->photo->getClientOriginalName())
                ->toMediaCollection('avatar');

            $this->reset('photo');
        }

        // Auto-extract Google Scholar ID from URL if provided
        $gsId = $validated['google_scholar_id'] ?: null;
        if ($gsId && str_contains($gsId, 'user=')) {
            preg_match('/user=([^&]+)/', $gsId, $matches);
            $gsId = $matches[1] ?? $gsId;
        }

        // Handle hybrid institution
        $finalInstitutionId = app(\App\Actions\HandleHybridInstitution::class)->execute($validated['institution_id']);
        $finalInstitutionName = is_numeric($validated['institution_id']) ? null : $validated['institution_id'];

        // Update or create identity
        $identityData = [
            'identity_id' => $validated['identity_id'],
            'type' => $validated['type'],
            'sinta_id' => $validated['sinta_id'] ?: null,
            'scopus_id' => $validated['scopus_id'] ?: null,
            'google_scholar_id' => $gsId,
            'wos_id' => $validated['wos_id'] ?: null,
            'title_prefix' => $validated['title_prefix'] ?: null,
            'title_suffix' => $validated['title_suffix'] ?: null,
            'address' => $validated['address'] ?: null,
            'birthdate' => $validated['birthdate'] ?: null,
            'birthplace' => $validated['birthplace'] ?: null,
            'institution_id' => $finalInstitutionId,
            'institution_name' => $finalInstitutionName,
            'faculty_id' => $validated['faculty_id'] ?? null,
            'study_program_id' => $validated['study_program_id'] ?? null,
            'scopus_h_index' => $validated['scopus_h_index'] ?? 0,
            'gs_h_index' => $validated['gs_h_index'] ?? 0,
            'wos_h_index' => $validated['wos_h_index'] ?? 0,
        ];
        $user->identity()->updateOrCreate(
            ['user_id' => $user->id],
            $identityData
        );

        \App\Models\ActivityLog::create([
            'user_id' => $user->id,
            'activity' => 'profile_update',
            'description' => 'User memperbarui informasi profil/identitas',
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);

        $this->dispatch('profile-updated', name: $user->name);

        $message = 'Profile berhasil diperbarui.';
        session()->flash('success', $message);
        $this->toastSuccess($message);
    }

    /**
     * Remove the current user's profile picture.
     */
    public function removeAvatar(): void
    {
        $user = Auth::user();

        $user->clearMediaCollection('avatar');

        if ($user->identity && $user->identity->profile_picture) {
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($user->identity->profile_picture)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($user->identity->profile_picture);
            }

            $user->identity->update(['profile_picture' => null]);
        }

        $this->dispatch('profile-updated', name: $user->name);
        $this->toastSuccess('Foto profil berhasil dihapus.');
    }

    /**
     * Send an email verification notification to the current user.
     */
    public function resendVerificationNotification(): void
    {
        $user = Auth::user();

        if ($user->hasVerifiedEmail()) {
            $this->redirectIntended(default: route('dashboard', absolute: false));

            return;
        }

        $user->sendEmailVerificationNotification();

        Session::flash('status', 'verification-link-sent');
    }

    /**
     * Reset the form to original values.
     */
    public function resetForm(): void
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->email = $user->email;

        if ($user->identity) {
            $this->identity_id = $user->identity->identity_id;
            $this->type = $user->identity->type;
            $this->sinta_id = $user->identity->sinta_id ?? '';
            $this->scopus_id = $user->identity->scopus_id ?? '';
            $this->google_scholar_id = $user->identity->google_scholar_id ?? '';
            $this->wos_id = $user->identity->wos_id ?? '';
            $this->title_prefix = $user->identity->title_prefix ?? '';
            $this->title_suffix = $user->identity->title_suffix ?? '';
            $this->address = $user->identity->address ?? '';
            $this->birthdate = $user->identity->birthdate?->format('Y-m-d') ?? '';
            $this->birthplace = $user->identity->birthplace ?? '';
            $this->institution_id = $user->identity->institution_id;
            $this->faculty_id = $user->identity->faculty_id;
            $this->study_program_id = $user->identity->study_program_id;
            $this->scopus_h_index = $user->identity->scopus_h_index ?? 0;
            $this->gs_h_index = $user->identity->gs_h_index ?? 0;
            $this->wos_h_index = $user->identity->wos_h_index ?? 0;

            // Reload faculties based on institution
            if ($this->institution_id) {
                $this->faculties = Faculty::where('institution_id', $this->institution_id)
                    ->orderBy('name')
                    ->get()
                    ->toArray();
            }

            // Reload study programs based on faculty
            if ($this->faculty_id) {
                $this->studyPrograms = StudyProgram::where('faculty_id', $this->faculty_id)
                    ->orderBy('name')
                    ->get()
                    ->toArray();
            } elseif ($this->institution_id) {
                $this->studyPrograms = StudyProgram::where('institution_id', $this->institution_id)
                    ->orderBy('name')
                    ->get()
                    ->toArray();
            }
        }

        $this->resetErrorBag();
    }

    public function render()
    {
        return view('livewire.settings.profile-form');
    }
}
