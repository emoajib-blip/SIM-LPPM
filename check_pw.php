<?php

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$users = App\Models\User::all();
$result = $users->map(function ($u) {
    return [
        'id' => $u->id,
        'name' => $u->name,
        'username' => $u->username,
        'has_password' => ! empty($u->password),
        'original_password' => $u->original_password,
    ];
});

echo json_encode($result, JSON_PRETTY_PRINT);
