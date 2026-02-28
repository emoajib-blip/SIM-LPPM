<?php

$dir = __DIR__.'/resources/views';
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($dir));

foreach ($iterator as $file) {
    if ($file->isFile() && $file->getExtension() === 'php') {
        $originalContent = file_get_contents($file->getRealPath());
        $content = $originalContent;

        // 1. Convert URL::signedRoute(...) to \Illuminate\Support\Facades\URL::temporarySignedRoute(..., now()->addMinutes(config('media-library.temporary_url_default_lifetime', 5)), ...)
        $content = preg_replace(
            '/URL::signedRoute\(\s*\'media\.download\'\s*,\s*\[\'media\'\s*=>\s*([^\]]+)\]\s*\)/',
            '\Illuminate\Support\Facades\URL::temporarySignedRoute(\'media.download\', now()->addMinutes(config(\'media-library.temporary_url_default_lifetime\', 5)), [\'media\' => $1])',
            $content
        );

        $content = preg_replace(
            '/\\\\Illuminate\\\\Support\\\\Facades\\\\URL::signedRoute\(\s*\'media\.download\'\s*,\s*\[\'media\'\s*=>\s*([^\]]+)\]\s*\)/',
            '\Illuminate\Support\Facades\URL::temporarySignedRoute(\'media.download\', now()->addMinutes(config(\'media-library.temporary_url_default_lifetime\', 5)), [\'media\' => $1])',
            $content
        );

        // 2. Convert now()->addMinutes(15) to now()->addMinutes(config('media-library.temporary_url_default_lifetime', 5))
        $content = str_replace(
            'now()->addMinutes(15)',
            'now()->addMinutes(config(\'media-library.temporary_url_default_lifetime\', 5))',
            $content
        );

        if ($content !== $originalContent) {
            file_put_contents($file->getRealPath(), $content);
            echo 'Updated: '.$file->getRealPath()."\n";
        }
    }
}

echo "Done.\n";
