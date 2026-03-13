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
        Schema::table('additional_outputs', function (Blueprint $table) {
            if (! Schema::hasColumn('additional_outputs', 'indexing_body')) {
                Schema::table('additional_outputs', function (Blueprint $table) {
                    $table->string('indexing_body')->nullable()->after('rank');
                });
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('additional_outputs', function (Blueprint $table) {
            $table->dropColumn('indexing_body');
        });
    }
};
