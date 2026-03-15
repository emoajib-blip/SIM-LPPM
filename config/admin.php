<?php

return [
    'superadmin' => [
        'email' => env('SUPERADMIN_EMAIL', 'superadmin@email.com'),
        'name' => env('SUPERADMIN_NAME', 'Super Administrator'),
    ],
    'admin_lppm' => [
        'email' => env('ADMIN_LPPM_EMAIL', 'admin-lppm@email.com'),
        'name' => env('ADMIN_LPPM_NAME', 'Admin LPPM'),
    ],
    'rektor' => [
        'email' => env('REKTOR_EMAIL', 'rektor@email.com'),
        'name' => env('REKTOR_NAME', 'Ali Imron'),
    ],
    'initial_password' => env('INITIAL_ADMIN_PASSWORD', 'password'),
];
