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
        Schema::table('identities', function (Blueprint $table) {
            // Academic Profile
            $table->string('last_education')->nullable()->comment('Pendidikan Terakhir');
            $table->string('functional_position')->nullable()->comment('Jabatan Fungsional');
            $table->string('title_prefix')->nullable()->comment('Gelar Depan');
            $table->string('title_suffix')->nullable()->comment('Gelar Belakang');

            // Sinta Scores
            $table->float('sinta_score_v2_overall')->default(0)->comment('Sinta Score V2 Overall');
            $table->float('sinta_score_v2_3yr')->default(0)->comment('Sinta Score V2 3Yr');
            $table->float('sinta_score_v3_overall')->default(0)->comment('Sinta Score V3 Overall');
            $table->float('sinta_score_v3_3yr')->default(0)->comment('Sinta Score V3 3Yr');
            $table->float('affil_score_v3_overall')->default(0)->comment('Affiliation Score V3 Overall');
            $table->float('affil_score_v3_3yr')->default(0)->comment('Affiliation Score V3 3Yr');

            // Scopus Metrics
            $table->integer('scopus_documents')->default(0);
            $table->integer('scopus_citations')->default(0);
            $table->integer('scopus_cited_documents')->default(0);
            $table->integer('scopus_h_index')->default(0);
            $table->integer('scopus_g_index')->default(0);
            $table->integer('scopus_i10_index')->default(0);

            // Google Scholar Metrics
            $table->integer('gs_documents')->default(0);
            $table->integer('gs_citations')->default(0);
            $table->integer('gs_cited_documents')->default(0);
            $table->integer('gs_h_index')->default(0);
            $table->integer('gs_g_index')->default(0);
            $table->integer('gs_i10_index')->default(0);

            // WoS Metrics
            $table->integer('wos_documents')->default(0);
            $table->integer('wos_citations')->default(0);
            $table->integer('wos_cited_documents')->default(0);
            $table->integer('wos_h_index')->default(0);
            $table->integer('wos_g_index')->default(0);
            $table->integer('wos_i10_index')->default(0);

            // Garuda Metrics
            $table->integer('garuda_documents')->default(0);
            $table->integer('garuda_citations')->default(0);
            $table->integer('garuda_cited_documents')->default(0);

            // Status
            $table->string('is_active')->default('Aktif')->comment('Status Aktif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('identities', function (Blueprint $table) {
            $table->dropColumn([
                'last_education', 'functional_position', 'title_prefix', 'title_suffix',
                'sinta_score_v2_overall', 'sinta_score_v2_3yr', 'sinta_score_v3_overall', 'sinta_score_v3_3yr',
                'affil_score_v3_overall', 'affil_score_v3_3yr',
                'scopus_documents', 'scopus_citations', 'scopus_cited_documents', 'scopus_h_index', 'scopus_g_index', 'scopus_i10_index',
                'gs_documents', 'gs_citations', 'gs_cited_documents', 'gs_h_index', 'gs_g_index', 'gs_i10_index',
                'wos_documents', 'wos_citations', 'wos_cited_documents', 'wos_h_index', 'wos_g_index', 'wos_i10_index',
                'garuda_documents', 'garuda_citations', 'garuda_cited_documents',
                'is_active',
            ]);
        });
    }
};
