<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('budget_groups', function (Blueprint $table) {
            $table->enum('proposal_type', ['research', 'community_service'])
                ->nullable()
                ->after('percentage')
                ->comment('Tipe proposal: research, community_service, atau null (keduanya)');

            $table->enum('percentage_type', ['min', 'max'])
                ->nullable()
                ->after('proposal_type')
                ->comment('Tipe batasan persentase: min (minimal) atau max (maksimal)');

            $table->boolean('is_active')
                ->default(true)
                ->after('percentage_type')
                ->comment('Status aktif/nonaktif kelompok anggaran');
        });
    }

    public function down(): void
    {
        Schema::table('budget_groups', function (Blueprint $table) {
            $table->dropColumn(['proposal_type', 'percentage_type', 'is_active']);
        });
    }
};
