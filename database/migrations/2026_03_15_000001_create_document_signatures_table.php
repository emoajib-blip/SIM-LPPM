<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('document_signatures', function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('document_type');
            $table->string('document_id');

            $table->string('variant')->nullable();
            $table->string('action');
            $table->string('signed_role');

            $table->foreignUuid('signed_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamp('signed_at')->nullable();

            $table->string('hash_alg')->default('sha256');
            $table->string('document_hash', 64)->nullable();

            $table->string('kid');
            $table->text('signature');

            $table->json('payload');
            $table->timestamps();

            $table->index(['document_type', 'document_id']);
            $table->index(['document_type', 'document_id', 'variant']);
            $table->index(['action', 'signed_role']);
            $table->index('signed_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('document_signatures');
    }
};
