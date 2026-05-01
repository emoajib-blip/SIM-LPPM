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
        Schema::create('quota_messages', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // e.g., 'button_tooltip', 'access_denied', 'dashboard_status'
            $table->text('message'); // Message template with placeholders like {limit}, {current}
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quota_messages');
    }
};
