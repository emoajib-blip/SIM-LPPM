<?php

$files = [
    '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/resources/views/livewire/settings/proposal-template.blade.php',
    '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/resources/views/livewire/admin-lppm/monev/monev-index.blade.php',
    '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/resources/views/livewire/research/proposal/steps/dokumen-pendukung.blade.php',
    '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/resources/views/livewire/community-service/proposal/steps/dokumen-pendukung.blade.php',
    '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/resources/views/livewire/research/final-report/show.blade.php',
    '/Volumes/WORK/PROJECT PROTOTYPE/sim-lppm-itsnu-main/resources/views/livewire/community-service/final-report/show.blade.php',
];

foreach ($files as $file) {
    if (! file_exists($file)) {
        continue;
    }
    $content = file_get_contents($file);

    // We already have things like:
    // <a href="{{ \Illuminate\Support\Facades\URL::temporarySignedRoute('media.download', now()->addMinutes(config('media-library.temporary_url_default_lifetime', 5)), ['media' => $media]) }}" class="btn btn-ghost-primary w-100" target="_blank" download>

    // Replace `target="_blank" download>` with `target="_blank" download="{{ $media->file_name ?? 'download' }}" data-navigate-ignore="true">`
    // However, the variable might be named $baMedia, $borangMedia, $rekapMedia, $media, or $this->researchTemplateMedia etc.
    // So we need to match the `$something` variable used in `['media' => $something]`!

    $content = preg_replace_callback('/<a\s+href="\{\{\s*\\\\Illuminate\\\\Support\\\\Facades\\\\URL::temporarySignedRoute\(\'media\.download\'.*?\[\'media\'\s*=>\s*(\$[^\]]+)\].*?\}\}"(.*?)>/is', function ($matches) {
        $varName = trim($matches[1]);
        $attrs = $matches[2];

        // Remove existing 'download' and 'data-navigate-ignore' from attrs to prevent dupes
        $attrs = preg_replace('/\\s*download(="[^"]*")?/is', '', $attrs);
        $attrs = preg_replace('/\\s*data-navigate-ignore(="[^"]*")?/is', '', $attrs);

        return "<a href=\"{{ \\Illuminate\\Support\\Facades\\URL::temporarySignedRoute('media.download', now()->addMinutes(config('media-library.temporary_url_default_lifetime', 5)), ['media' => ".$varName.']) }}"'.$attrs.' download="{{ '.$varName.'->file_name ?? '.$varName."->name ?? 'download' }}\" data-navigate-ignore=\"true\">";
    }, $content);

    file_put_contents($file, $content);
}
echo 'Done replacing.';
