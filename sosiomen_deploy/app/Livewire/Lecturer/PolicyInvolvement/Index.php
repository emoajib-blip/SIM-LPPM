<?php

namespace App\Livewire\Lecturer\PolicyInvolvement;

use App\Models\PolicyInvolvement;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads, WithPagination;

    public $showModal = false;

    public $editingId = null;

    // Form fields
    public $title;

    public $organization;

    public $level = 'Nasional';

    public $role;

    public $date;

    public $description;

    public $document;

    protected $rules = [
        'title' => 'required|string|max:255',
        'organization' => 'required|string|max:255',
        'level' => 'required|in:Internasional,Nasional,Regional/Institusi',
        'role' => 'nullable|string|max:255',
        'date' => 'required|date',
        'description' => 'nullable|string',
        'document' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ];

    public function mount()
    {
        $this->date = date('Y-m-d');
    }

    public function openModal(?string $id = null)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        if ($id) {
            $this->editingId = $id;
            $involvement = PolicyInvolvement::findOrFail($id);
            $this->title = $involvement->title;
            $this->organization = $involvement->organization;
            $this->level = $involvement->level;
            $this->role = $involvement->role;
            $this->date = $involvement->date->format('Y-m-d');
            $this->description = $involvement->description;
        } else {
            $this->editingId = null;
            $this->reset(['title', 'organization', 'level', 'role', 'description', 'document']);
            $this->date = date('Y-m-d');
        }

        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'user_id' => Auth::id(),
            'title' => $this->title,
            'organization' => $this->organization,
            'level' => $this->level,
            'role' => $this->role,
            'date' => $this->date,
            'description' => $this->description,
        ];

        if ($this->editingId) {
            $involvement = PolicyInvolvement::findOrFail($this->editingId);
            $involvement->update($data);
            $message = 'Rekognisi berhasil diperbarui.';
        } else {
            $involvement = PolicyInvolvement::create($data);
            $message = 'Rekognisi berhasil ditambahkan.';
        }

        if ($this->document) {
            $involvement->clearMediaCollection('supporting_document');
            $involvement->addMedia($this->document->getRealPath())
                ->usingFileName($this->document->getClientOriginalName())
                ->toMediaCollection('supporting_document');
        }

        $this->showModal = false;
        $this->dispatch('notify', [
            'type' => 'success',
            'message' => $message,
        ]);

        $this->resetPage();
    }

    public function verify(string $id)
    {
        if (!auth()->user()->activeHasAnyRole(['admin lppm', 'kepala lppm'])) {
            return;
        }

        $involvement = PolicyInvolvement::findOrFail($id);
        $involvement->update([
            'status' => 'verified',
            'verified_at' => now(),
            'verified_by' => auth()->id(),
        ]);

        $this->dispatch('notify', [
            'type' => 'success',
            'message' => 'Rekognisi berhasil diverifikasi.',
        ]);
    }

    public function reject(string $id)
    {
        if (!auth()->user()->activeHasAnyRole(['admin lppm', 'kepala lppm'])) {
            return;
        }

        $involvement = PolicyInvolvement::findOrFail($id);
        $involvement->update([
            'status' => 'rejected',
            'verified_at' => now(),
            'verified_by' => auth()->id(),
        ]);

        $this->dispatch('notify', [
            'type' => 'info',
            'message' => 'Rekognisi ditolak.',
        ]);
    }

    public function delete(string $id)
    {
        $involvement = PolicyInvolvement::when(!auth()->user()->activeHasAnyRole(['admin lppm', 'kepala lppm']), function ($q) {
            $q->where('user_id', Auth::id());
        })->findOrFail($id);

        $involvement->delete();

        $this->dispatch('notify', [
            'type' => 'info',
            'message' => 'Rekognisi berhasil dihapus.',
        ]);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        $isAdmin = auth()->user()->activeHasAnyRole(['admin lppm', 'kepala lppm']);

        $involvements = PolicyInvolvement::with('user')
            ->when(!$isAdmin, function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->orderBy('date', 'desc')
            ->paginate(10);

        return view('livewire.lecturer.policy-involvement.index', [
            'involvements' => $involvements,
            'isAdmin' => $isAdmin,
        ])->layout('components.layouts.app', ['title' => 'Rekognisi & Kebijakan']);
    }
}
