<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('monev_reviews', function (Blueprint $table) {
            if (! Schema::hasColumn('monev_reviews', 'finalized_by_lppm_by')) {
                $table->uuid('finalized_by_lppm_by')->nullable()->after('finalized_by_lppm_at');
                $table->foreign('finalized_by_lppm_by')->references('id')->on('users')->nullOnDelete();
            }
            if (! Schema::hasColumn('monev_reviews', 'approved_by_kepala_by')) {
                $table->uuid('approved_by_kepala_by')->nullable()->after('approved_by_kepala_at');
                $table->foreign('approved_by_kepala_by')->references('id')->on('users')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('monev_reviews', function (Blueprint $table) {
            if (Schema::hasColumn('monev_reviews', 'finalized_by_lppm_by')) {
                $table->dropForeign(['finalized_by_lppm_by']);
                $table->dropColumn('finalized_by_lppm_by');
            }
            if (Schema::hasColumn('monev_reviews', 'approved_by_kepala_by')) {
                $table->dropForeign(['approved_by_kepala_by']);
                $table->dropColumn('approved_by_kepala_by');
            }
        });
    }
};
