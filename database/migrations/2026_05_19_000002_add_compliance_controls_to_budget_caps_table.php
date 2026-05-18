<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('budget_caps', function (Blueprint $table) {
            $table->boolean('enforce_percentage')
                ->default(true)
                ->after('scheme_caps')
                ->comment('Toggle validasi persentase per komponen (panic button): true=aktif, false=skip validasi');
        });
    }

    public function down(): void
    {
        Schema::table('budget_caps', function (Blueprint $table) {
            $table->dropColumn('enforce_percentage');
        });
    }
};
