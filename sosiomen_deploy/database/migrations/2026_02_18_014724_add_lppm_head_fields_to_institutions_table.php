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
        Schema::table('institutions', function (Blueprint $table) {
            $table->string('lppm_head_name')->nullable()->after('name');
            $table->string('lppm_head_id')->nullable()->after('lppm_head_name');
            $table->foreignUuid('lppm_head_user_id')->nullable()->after('lppm_head_id')->constrained('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('institutions', function (Blueprint $table) {
            $table->dropForeign(['lppm_head_user_id']);
            $table->dropColumn(['lppm_head_name', 'lppm_head_id', 'lppm_head_user_id']);
        });
    }
};
