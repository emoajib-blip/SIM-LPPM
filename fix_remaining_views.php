<?php

$files = [
    'resources/views/livewire/research/proposal/steps/substansi-usulan.blade.php',
    'resources/views/livewire/community-service/proposal/steps/substansi-usulan.blade.php',
    'resources/views/livewire/community-service/proposal/components/substansi-usulan.blade.php',
    'resources/views/livewire/research/daily-note/show.blade.php',
    'resources/views/livewire/community-service/daily-note/show.blade.php',
    'resources/views/livewire/research/progress-report/show.blade.php',
    'resources/views/livewire/community-service/progress-report/show.blade.php',
    'resources/views/livewire/research/final-report/show.blade.php',
    'resources/views/livewire/community-service/final-report/show.blade.php',
];

foreach ($files as $file) {
    $path = '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/'.$file;
    if (! file_exists($path)) {
        continue;
    }

    $content = file_get_contents($path);

    // Pattern to catch media.download links and add attributes
    // This time we use a more careful replacement that doesn't break Blade tags.
    // We look for <a> tags containing media.download
    $newContent = preg_replace_callback('/<a\s+([^>]*href=[^>]+media\.download[^>]*)>/is', function ($matches) {
        $attrs = $matches[1];

        // Add data-navigate-ignore if missing
        if (strpos($attrs, 'data-navigate-ignore') === false) {
            $attrs .= ' data-navigate-ignore="true"';
        }

        // Add download if missing
        if (strpos($attrs, 'download=') === false) {
            // Try to find the media variable
            if (preg_match('/[\'"]media[\'"]\s*=>\s*(\$[a-zA-Z0-9_>\-\(\)]+)/', $attrs, $varMatch)) {
                $var = $varMatch[1];
                $attrs .= " download=\"{{ $var->file_name ?? $var->name ?? 'download' }}\"";
            } else {
                $attrs .= ' download="download"';
            }
        }

        return "<a $attrs>";
    }, $content);

    if ($content !== $newContent) {
        file_put_contents($path, $newContent);
        echo "Fixed: $file\n";
    }
}
