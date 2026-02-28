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
            $table->string('strata')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('research_schemes', function (Blueprint $table) {
            $table->enum('strata', ['Dasar', 'Terapan', 'Pengembangan', 'PKM'])->change();
        });
    }
};
