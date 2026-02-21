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
        Schema::table('faculties', function (Blueprint $table) {
            $table->foreignUuid('dean_user_id')->nullable()->after('dean_id')->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('faculties', function (Blueprint $table) {
            $table->dropForeign(['dean_user_id']);
            $table->dropColumn('dean_user_id');
        });
    }
};
