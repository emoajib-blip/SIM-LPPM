<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('media')
            ->where('disk', 's3')
            ->update(['disk' => 'public']);

        DB::table('media')
            ->where('conversions_disk', 's3')
            ->update(['conversions_disk' => 'public']);
    }

    public function down(): void {}
};
