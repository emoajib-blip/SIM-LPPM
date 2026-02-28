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
        Schema::table('mandatory_outputs', function (Blueprint $table) {
            $table->string('rank', 50)->nullable()->after('issn')->comment('S1-S6, Q1-Q4');
        });

        Schema::table('additional_outputs', function (Blueprint $table) {
            $table->string('rank', 50)->nullable()->after('issn')->comment('S1-S6, Q1-Q4');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mandatory_outputs', function (Blueprint $table) {
            $table->dropColumn('rank');
        });

        Schema::table('additional_outputs', function (Blueprint $table) {
            $table->dropColumn('rank');
        });
    }
};
