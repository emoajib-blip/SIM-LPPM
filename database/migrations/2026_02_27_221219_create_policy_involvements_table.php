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
        Schema::create('policy_involvements', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('user_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->string('organization');
            $table->enum('level', ['Internasional', 'Nasional', 'Regional/Institusi'])->default('Nasional');
            $table->string('role')->nullable();
            $table->date('date');
            $table->enum('status', ['pending', 'verified', 'rejected'])->default('pending');
            $table->text('description')->nullable();
            $table->timestamp('verified_at')->nullable();
            $table->foreignUuid('verified_by')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('policy_involvements');
    }
};
