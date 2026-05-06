<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('progress_reports', function (Blueprint $table) {
            $table->enum('status', ['DRAFT', 'SUBMITTED', 'approved_by_dekan', 'APPROVED', 'REJECTED'])
                ->default('DRAFT')
                ->comment('Status laporan')
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('progress_reports', function (Blueprint $table) {
            $table->enum('status', ['draft', 'submitted', 'approved'])
                ->default('draft')
                ->comment('Status laporan')
                ->change();
        });
    }
};
