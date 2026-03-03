<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Hapus role legacy dari database
        DB::table('roles')
            ->whereIn('name', ['admin lppm saintek', 'admin lppm dekabita'])
            ->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('roles')->insertOrIgnore([
            [
                'name' => 'admin lppm saintek',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'admin lppm dekabita',
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
};
