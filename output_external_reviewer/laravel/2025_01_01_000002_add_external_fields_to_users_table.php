<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignUuid('institution_id')->nullable()->constrained();
            $table->boolean('is_external')->default(false);
            $table->timestamp('mfa_enabled_at')->nullable();
            $table->string('nidn')->nullable()->unique();
            $table->json('security_metadata')->nullable(); // Zero Trust logs
        });
    }
};
