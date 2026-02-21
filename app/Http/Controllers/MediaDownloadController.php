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
        $headers = [
            'Content-Type' => $media->mime_type,
        ];

        return response()->file($path, $headers);
    }

    protected function canAccessMedia($user, Media $media): bool
    {
        if ($user->hasAnyRole(['admin lppm', 'kepala lppm', 'superadmin', 'rektor', 'dekan'])) {
            return true;
        }

        $model = $media->model;

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
