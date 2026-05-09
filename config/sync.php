<?php

return [
    'ssh_host' => env('SYNC_SSH_HOST', ''),
    'ssh_user' => env('SYNC_SSH_USER', ''),
    'ssh_port' => env('SYNC_SSH_PORT', 22),
    'ssh_key_path' => env('SYNC_SSH_KEY_PATH', ''),
    'remote_host' => env('SYNC_REMOTE_HOST', env('SYNC_SSH_HOST', '')),
    'remote_user' => env('SYNC_REMOTE_USER', ''),
    'remote_path' => env('SYNC_REMOTE_PATH', ''),
    'remote_db' => env('SYNC_REMOTE_DB', ''),
    'remote_db_user' => env('SYNC_REMOTE_DB_USER', ''),
    'remote_db_password' => env('SYNC_REMOTE_DB_PASSWORD', ''),
    'remote_db_connection' => env('SYNC_REMOTE_DB_CONNECTION', 'mysql'),
];
