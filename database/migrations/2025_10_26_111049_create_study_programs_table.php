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
        Schema::create('study_programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('institution_id')->comment('Institusi')->constrained('institutions')->onDelete('cascade');
            $table->foreignId('faculty_id')->nullable()->comment('Fakultas')->constrained('faculties')->onDelete('set null');
            $table->string('name')->comment('Nama Program Studi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('study_programs');
    }
};
