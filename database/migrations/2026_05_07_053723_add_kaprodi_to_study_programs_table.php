<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('study_programs', function (Blueprint $table) {
            $table->foreignUuid('kaprodi_user_id')
                ->nullable()
                ->after('faculty_id')
                ->comment('User ID of Kaprodi assigned to this study program')
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('study_programs', function (Blueprint $table) {
            $table->dropForeign(['kaprodi_user_id']);
            $table->dropColumn('kaprodi_user_id');
        });
    }
};
