<?php

use App\Models\User;

if (! function_exists('active_role')) {
    /**
     * Get the currently active role for the authenticated user.
     */
    function active_role(): ?string
    {
        return session('active_role');
    }
}

if (! function_exists('active_role_is')) {
    /**
     * Check if the given role is the currently active role.
     */
    function active_role_is(string $role): bool
    {
        return active_role() === $role;
    }
}

if (! function_exists('format_role_name')) {
    /**
     * Format role name for display (convert to title case).
     */
    function format_role_name(string $role): string
    {
        // Special replacements
        $replacements = [
            'admin lppm' => 'Admin Lppm',
            'kepala lppm' => 'Kepala Lppm',
        ];

        $result = str_replace(array_keys($replacements), array_values($replacements), $role);

        return ucwords($result);
    }
}

if (! function_exists('active_has_role')) {
    /**
     * Check if the active role matches the given role.
     */
    function active_has_role(string $role): bool
    {
        $activeRole = active_role();

        return $activeRole === $role;
    }
}

if (! function_exists('active_has_any_role')) {
    /**
     * Check if the active role matches any of the given roles.
     */
    function active_has_any_role(array $roles): bool
    {
        $activeRole = active_role();

        return in_array($activeRole, $roles, true);
    }
}

if (! function_exists('active_has_all_roles')) {
    /**
     * Check if the active role matches all of the given roles.
     */
    function active_has_all_roles(array $roles): bool
    {
        $activeRole = active_role();

        foreach ($roles as $role) {
            if ($activeRole !== $role) {
                return false;
            }
        }

        return true;
    }
}

if (! function_exists('sql_year')) {
    /**
     * Get the SQL expression for extracting year from a date column.
     */
    function sql_year(string $column = 'created_at'): string
    {
        $driver = strtolower(\Illuminate\Support\Facades\DB::getDriverName());

        return $driver === 'sqlite'
            ? "strftime('%Y', {$column})"
            : "YEAR({$column})";
    }
}

if (! function_exists('generate_qr_code_data_uri')) {
    /**
     * Generate a QR code as a data URI (SVG).
     */
    function generate_qr_code_data_uri(string $data, int $size = 150): string
    {
        $renderer = new \BaconQrCode\Renderer\ImageRenderer(
            new \BaconQrCode\Renderer\RendererStyle\RendererStyle($size),
            new \BaconQrCode\Renderer\Image\SvgImageBackEnd
        );
        $writer = new \BaconQrCode\Writer($renderer);
        $svg = $writer->writeString($data);

        return 'data:image/svg+xml;base64,'.base64_encode($svg);
    }
}
