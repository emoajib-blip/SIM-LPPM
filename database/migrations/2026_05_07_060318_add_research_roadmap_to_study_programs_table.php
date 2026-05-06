<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('study_programs', function (Blueprint $table) {
            $table->json('research_roadmap')
                ->nullable()
                ->after('kaprodi_user_id')
                ->comment('Program-specific research roadmap (JSON)');

            $table->string('roadmap_status')->default('draft')->after('research_roadmap')->comment('draft, submitted, approved, rejected');
        });
    }

    public function down(): void
    {
        Schema::table('study_programs', function (Blueprint $table) {
            $table->dropColumn(['research_roadmap', 'roadmap_status']);
        });
    }
};
