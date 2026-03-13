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
            $table->enum('type', ['dosen', 'mahasiswa', 'reviewer', 'tendik'])->comment('Tipe User')->change();
        });
    }

    public function down(): void
    {
        Schema::table('identities', function (Blueprint $table) {
            $table->enum('type', ['dosen', 'mahasiswa'])->comment('Tipe User')->change();
        });
    }
};
