<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('reviewer_profiles');
        Schema::create('reviewer_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('user_id')->constrained()->cascadeOnDelete();

            // Flexible Institution Linking
            // If institution_id is set, use relation.
            // If user input manual & admin hasn't verified/created master data yet, use institution_name.
            $table->foreignId('institution_id')->nullable()->constrained('institutions')->nullOnDelete();
            $table->string('institution_name')->nullable(); // Fallback for "Manual Input"

            $table->string('academic_title')->nullable(); // Gelar akademik
            $table->string('nidn')->nullable(); // Nomor Induk Dosen Nasional (External)
            $table->text('expertise_keywords')->nullable(); // Comma separated topics

            $table->timestamps();

            // Indexing for search performance
            $table->index(['user_id', 'institution_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviewer_profiles');
    }
};
