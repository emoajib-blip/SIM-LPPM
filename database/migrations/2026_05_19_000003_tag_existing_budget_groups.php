<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::table('budget_groups')
            ->whereNull('proposal_type')
            ->update([
                'percentage_type' => 'max',
                'is_active' => true,
            ]);
    }

    public function down(): void
    {
        DB::table('budget_groups')
            ->whereNull('proposal_type')
            ->update([
                'percentage_type' => null,
            ]);
    }
};
