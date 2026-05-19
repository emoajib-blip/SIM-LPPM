<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Update the status column to include all ReportStatus enum values
        if (DB::getDriverName() === 'sqlite') {
            // SQLite doesn't support MODIFY COLUMN, need to recreate table
            Schema::table('progress_reports', function (Blueprint $table) {
                $table->dropColumn('status');
            });

            Schema::table('progress_reports', function (Blueprint $table) {
                $table->enum('status', ['draft', 'submitted', 'approved_by_dekan', 'approved', 'rejected'])
                    ->default('draft')
                    ->comment('Status laporan')
                    ->after('reporting_period');
            });
        } else {
            DB::statement("ALTER TABLE progress_reports MODIFY COLUMN status ENUM('draft', 'submitted', 'approved_by_dekan', 'approved', 'rejected') DEFAULT 'draft' COMMENT 'Status laporan'");
        }
    }

    public function down(): void
    {
        if (DB::getDriverName() === 'sqlite') {
            Schema::table('progress_reports', function (Blueprint $table) {
                $table->dropColumn('status');
            });

            Schema::table('progress_reports', function (Blueprint $table) {
                $table->enum('status', ['draft', 'submitted', 'approved'])
                    ->default('draft')
                    ->comment('Status laporan')
                    ->after('reporting_period');
            });
        } else {
            DB::statement("ALTER TABLE progress_reports MODIFY COLUMN status ENUM('draft', 'submitted', 'approved') DEFAULT 'draft' COMMENT 'Status laporan'");
        }
    }
};
