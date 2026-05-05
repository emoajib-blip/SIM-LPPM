<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

// Vetted by AI - Manual Review Required by Senior Engineer/Manager
class MediaDownloadController extends Controller
{
    public function download(Request $request, Media $media)
    {
        // 1. Strict UUID Validation
        if (! preg_match('/^[0-9a-f]{8}-[0-9a-f]{4}-4[0-9a-f]{3}-[89ab][0-9a-f]{3}-[0-9a-f]{12}$/i', $media->uuid)) {
            abort(400, 'Malformed Identifier');
        }

        // 2. Policy-Based Authorization
        $this->authorize('download', $media);

        $diskName = config('media-library.disk_name', 'public');

        if ($diskName === 's3') {
            // For S3, redirect to temporary signed URL
            return redirect($media->getTemporaryUrl(now()->addMinutes(5)));
        }

        // 3. Path Traversal & Existence Check for local disks
        $disk = \Illuminate\Support\Facades\Storage::disk($diskName);
        // getPath() already returns full path, don't double-prepend disk root
        $path = $media->getPath();
        if (str_contains($path, '..')) {
            abort(403, 'Invalid file path.');
        }
        $realPath = realpath($path);

        // Security Barrier: Ensure path is within the disk's root (not just storage_path)
        $diskRoot = $disk->path('');

        if ($realPath === false || $diskRoot === false || ! str_starts_with($realPath, $diskRoot)) {
            abort(403, 'Path traversal detected or illegal file path access.');
        }

        if (! file_exists($realPath)) {
            abort(404, 'File fisik tidak ditemukan di server.');
        }

        // 4. Runtime Integrity Check (Actual MIME vs Record MIME)
        $mimeAliases = [
            'image/jpg' => 'image/jpeg',
            'image/pjpeg' => 'image/jpeg',
            'image/x-png' => 'image/png',
        ];
        $actualMime = mime_content_type($realPath);
        $normalizeActual = $mimeAliases[$actualMime] ?? $actualMime;
        // Robustly normalize both recorded and actual MIME types before comparison.
        // This handles case-insensitivity and extra parameters (e.g., charset) which caused incorrect mismatches.
        $normalizedRecorded = $media->mime_type;
        if ($normalizedRecorded) {
            $baseMime = strtolower(explode(';', $normalizedRecorded, 2)[0]);
            $normalizedRecorded = $mimeAliases[$baseMime] ?? $baseMime;
        }

        $normalizedActualForCheck = $actualMime;
        if ($normalizedActualForCheck) {
            $baseMime = strtolower(explode(';', $normalizedActualForCheck, 2)[0]);
            $normalizedActualForCheck = $mimeAliases[$baseMime] ?? $baseMime;
        }

        if ($normalizedActualForCheck !== $normalizedRecorded) {
            Log::critical('SECURITY ALERT: MIME-Type Mismatch for file '.$media->uuid, [
                'recorded_mime' => $media->mime_type,
                'actual_mime' => $actualMime,
                'user_id' => Auth::id(),
            ]);
            abort(422, 'Data integrity policy violated. File content does not match expected format.');
        }

        // 5. Clean Buffer & Stream Download with Secure Headers
        while (ob_get_level() > 0) {
            @ob_end_clean();

        }

        return response()->download($realPath, $media->file_name, [
            'Content-Type' => $media->mime_type ?? 'application/octet-stream',
            'X-Content-Type-Options' => 'nosniff',
            'Content-Security-Policy' => "default-src 'none'; sandbox",
            'X-Frame-Options' => 'DENY',
            'Cache-Control' => 'no-cache, no-store, must-revalidate',
        ]);
    }
}
