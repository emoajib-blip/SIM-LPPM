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
        Schema::table('proposals', function (Blueprint $table) {
            $table->foreignId('study_program_roadmap_id')->nullable()->constrained()->nullOnDelete();
            $table->string('bima_proposal_id')->nullable();
            $table->boolean('is_roadmap_validated_by_kaprodi')->default(false);
            $table->text('kaprodi_validation_notes')->nullable();
            $table->datetime('kaprodi_validated_at')->nullable();
            $table->uuid('kaprodi_id')->nullable(); // UUID of user who validated
            // Do not constrain kaprodi_id strictly to allow user deletion if necessary, or let DB handle via constraints if preferred.
            // Using a simple nullable uuid column is safest for 'Zero Disruption'.
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proposals', function (Blueprint $table) {
            $table->dropForeign(['study_program_roadmap_id']);
            $table->dropColumn([
                'study_program_roadmap_id',
                'bima_proposal_id',
                'is_roadmap_validated_by_kaprodi',
                'kaprodi_validation_notes',
                'kaprodi_validated_at',
                'kaprodi_id',
            ]);
        });
    }
};
