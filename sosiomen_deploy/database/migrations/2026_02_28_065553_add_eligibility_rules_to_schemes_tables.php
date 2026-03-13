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
        Schema::table('research_schemes', function (Blueprint $table) {
            $table->json('eligibility_rules')->nullable()->after('strata');
        });

        Schema::table('community_service_schemes', function (Blueprint $table) {
            $table->json('eligibility_rules')->nullable()->after('strata');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_schemes', function (Blueprint $table) {
            $table->dropColumn('eligibility_rules');
        });

        Schema::table('community_service_schemes', function (Blueprint $table) {
            $table->dropColumn('eligibility_rules');
        });
    }
};
