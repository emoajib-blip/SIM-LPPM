<?php

$currentKid = env('DOCUMENT_SIGNATURE_KID', 'v1');
$keys = [
    $currentKid => env('DOCUMENT_SIGNATURE_SECRET'),
];

// Validation: Ensure current_kid exists in keys and has a non-empty secret
// We wrap this in a check to allow bootstrapping during static analysis or CLI if needed
if (env('APP_ENV') === 'production' && (! isset($keys[$currentKid]) || empty($keys[$currentKid]))) {
    throw new \InvalidArgumentException("Invalid document signature configuration: Missing or empty secret for current_kid '{$currentKid}'");
}

return [
    'current_kid' => $currentKid,
    'keys' => $keys,
];
