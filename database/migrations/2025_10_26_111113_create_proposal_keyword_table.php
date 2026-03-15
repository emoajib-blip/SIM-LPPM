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
        Schema::create('proposal_keyword', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('proposal_id')->comment('Proposal')->constrained('proposals')->onDelete('cascade');
            $table->foreignId('keyword_id')->comment('Kata Kunci')->constrained('keywords')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposal_keyword');
    }
};
