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
        Schema::create('rescues', function (Blueprint $table) {
            $table->id();
            $table->foreignId('travel_id')->constrained()->onDelete('cascade');
            $table->integer('numero_rescatados');
            $table->time('start_time');
            $table->time('end_time');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescues');
    }
};
