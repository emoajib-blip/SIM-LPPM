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
        Schema::create('proposal_target_iku', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('proposal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('master_iku_id')->constrained('master_ikus')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proposal_target_iku');
    }
};
