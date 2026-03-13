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
        Schema::table('budget_caps', function (Blueprint $table) {
            $table->json('scheme_caps')
                ->nullable()
                ->after('community_service_budget_cap')
                ->comment('Max budget mapping per specific scheme format: {"research": {"id": amount}, "community_service": {"id": amount}}');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budget_caps', function (Blueprint $table) {
            $table->dropColumn('scheme_caps');
        });
    }
};
