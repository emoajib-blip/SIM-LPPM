<?php

use Illuminate\Filesystem\Filesystem;

it('tidak ada penggunaan getUrl() atau getFirstMediaUrl() tersisa di views', function () {
    $fs = new Filesystem;
    $path = base_path('resources/views');
    $files = collect($fs->allFiles($path))
        ->filter(fn ($f) => str_ends_with($f->getFilename(), '.blade.php'));

    $violations = [];
    foreach ($files as $file) {
        $contents = $fs->get($file->getRealPath());
        if (str_contains($contents, 'getUrl(') || str_contains($contents, 'getFirstMediaUrl(')) {
            $violations[] = $file->getRealPath();
        }
    }

    expect($violations)->toBeEmpty();
});
