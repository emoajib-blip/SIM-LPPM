<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proposal_kaprodi_approvals', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('proposal_id');
            $table->uuid('kaprodi_user_id');
            $table->string('status')->default('pending');
            $table->text('notes')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('rejected_at')->nullable();
            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('proposals')->cascadeOnDelete();
            $table->foreign('kaprodi_user_id')->references('id')->on('users')->cascadeOnDelete();

            $table->index(['proposal_id', 'status']);
            $table->index(['kaprodi_user_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proposal_kaprodi_approvals');
    }
};
