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
        $tables = ['focus_areas', 'themes', 'topics', 'science_clusters', 'tkt_levels'];

        foreach ($tables as $tableName) {
            Schema::table($tableName, function (Blueprint $table) {
                $table->boolean('is_active_for_research')->default(true);
                $table->boolean('is_active_for_community_service')->default(true);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = ['focus_areas', 'themes', 'topics', 'science_clusters', 'tkt_levels'];

        foreach ($tables as $tableName) {
            if (Schema::hasTable($tableName)) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->dropColumn(['is_active_for_research', 'is_active_for_community_service']);
                });
            }
        }
    }
};
