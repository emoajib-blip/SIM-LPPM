<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('faculties', function (Blueprint $table) {
            $table->json('research_roadmap')
                ->nullable()
                ->after('dean_user_id')
                ->comment('5-year faculty research roadmap (JSON)');
        });
    }

    public function down(): void
    {
        Schema::table('faculties', function (Blueprint $table) {
            $table->dropColumn('research_roadmap');
        });
    }
};
