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
        Schema::table('national_priorities', function (Blueprint $table) {
            $table->string('prn_code')->nullable()->after('name');
            $table->year('valid_from')->nullable()->after('prn_code');
            $table->year('valid_until')->nullable()->after('valid_from');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('national_priorities', function (Blueprint $table) {
            $table->dropColumn(['prn_code', 'valid_from', 'valid_until']);
        });
    }
};
