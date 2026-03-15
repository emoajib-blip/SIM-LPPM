<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('institutional_reports', function (Illuminate\Database\Schema\Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('type'); // research, pkm, output, partner, iku
            $table->year('year');
            $table->string('status')->default('draft');
            $table->timestamp('submitted_at')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->foreignUuid('submitted_by')->nullable()->constrained('users');
            $table->foreignUuid('approved_by')->nullable()->constrained('users');
            $table->text('notes')->nullable();
            $table->json('metadata')->nullable();
            $table->string('signature_path')->nullable();
            $table->timestamps();

            $table->unique(['type', 'year']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institutional_reports');
    }
};
