<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Add columns as nullable first
        Schema::table('proposal_monevs', function (Blueprint $table) {
            if (!Schema::hasColumn('proposal_monevs', 'academic_year')) {
                $table->string('academic_year')->nullable()->after('proposal_id');
            }
            if (!Schema::hasColumn('proposal_monevs', 'semester')) {
                $table->enum('semester', ['ganjil', 'genap'])->nullable()->after('academic_year');
            }
        });

        // 2. Update existing records with fallback to proposal data
        // Using a join update syntax compatible with MySQL/MariaDB
        DB::statement("
            UPDATE proposal_monevs 
            INNER JOIN proposals ON proposal_monevs.proposal_id = proposals.id
            SET proposal_monevs.academic_year = proposals.start_year,
                proposal_monevs.semester = IFNULL(proposals.semester, 'ganjil')
            WHERE proposal_monevs.academic_year IS NULL
        ");

        // 3. Set columns to NOT NULL after data is populated
        Schema::table('proposal_monevs', function (Blueprint $table) {
            $table->string('academic_year')->nullable(false)->change();
            $table->enum('semester', ['ganjil', 'genap'])->nullable(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('proposal_monevs', function (Blueprint $table) {
            $table->dropColumn(['academic_year', 'semester']);
        });
    }
};
