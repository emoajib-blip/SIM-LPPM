<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Adds semester support to budget_caps table.
     */
    public function up(): void
    {
        Schema::table('budget_caps', function (Blueprint $table) {
            // Remove the unique constraint on year to allow multiple semesters per year
            $table->dropUnique(['year']);

            // Add semester column (ganjil/genap) aligned with proposals table
            $table->enum('semester', ['ganjil', 'genap'])->default('ganjil')->after('year');

            // Add new unique constraint for year and semester combination
            $table->unique(['year', 'semester']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budget_caps', function (Blueprint $table) {
            $table->dropUnique(['year', 'semester']);
            $table->dropColumn('semester');
            $table->year('year')->unique()->change();
        });
    }
};
