<?php

namespace App\Http\Controllers;

use App\Models\AdditionalOutput;
use App\Models\DailyNote;
use App\Models\MandatoryOutput;
use App\Models\ProgressReport;
use App\Models\Proposal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaDownloadController extends Controller
{
    public function download(Request $request, Media $media)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (! $user || ! $this->canAccessMedia($user, $media)) {
            abort(403, 'Anda tidak memiliki akses ke file ini.');
        }

        $path = $media->getPath();

        if (! file_exists($path)) {
            abort(404, 'File fisik tidak ditemukan di server.');
        }

        // Sanitize filename: remove redundant dots before extension if any
        // e.g. "manual.2024....docx" -> "manual.2024.docx"
        $fileName = $media->file_name;
        if (preg_match('/\.+(\.[^.]+)$/', $fileName)) {
            $fileName = preg_replace('/\.+(\.[^.]+)$/', '$1', $fileName);
        }

        if (ob_get_level()) {
            ob_end_clean();
        }

        return response()->download($path, $fileName, [
            'Content-Type' => $media->mime_type,
            'Content-Disposition' => 'attachment; filename="'.str_replace('"', '\"', $fileName).'"',
        ]);
    }

    protected function canAccessMedia($user, Media $media): bool
    {
        if ($user->hasAnyRole(['admin lppm', 'kepala lppm', 'superadmin', 'rektor', 'dekan'])) {
            return true;
        }

        $model = $media->model;

        // Settings are global templates (e.g. Borang Monev, Surat Kesanggupan),
        // they should be downloadable by any authenticated user.
        if ($model instanceof \App\Models\Setting) {
            return true;
        }

        $proposalId = null;

        if ($model instanceof ProgressReport) {
            $proposalId = $model->proposal_id;
        } elseif ($model instanceof DailyNote) {
            $proposalId = $model->proposal_id;
        } elseif ($model instanceof MandatoryOutput) {
            $proposalId = optional($model->progressReport)->proposal_id;
        } elseif ($model instanceof AdditionalOutput) {
            $proposalId = optional($model->progressReport)->proposal_id;
        } elseif (method_exists($model, 'proposal')) {
            try {
                $proposalId = optional($model->proposal)->id;
            } catch (\Throwable $e) {
                $proposalId = null;
            }
        }

        if (! $proposalId) {
            return false;
        }

        $proposal = Proposal::find($proposalId);
        if (! $proposal) {
            return false;
        }

        if ($proposal->submitter_id === $user->id) {
            return true;
        }

        return $proposal->teamMembers()
            ->where('users.id', $user->id)
            ->where('proposal_team_members.status', 'accepted')
            ->exists();
    }
}
