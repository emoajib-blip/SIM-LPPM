<?php

namespace App\Policies;

use App\Models\User;
use App\Services\MediaDownloadService;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaPolicy
{
    public function __construct(
        protected MediaDownloadService $downloadService
    ) {}

    /**
     * Determine whether the user can download the media.
     */
    public function download(User $user, Media $media): bool
    {
        return $this->downloadService->canUserAccessMedia($user, $media);
    }
}
