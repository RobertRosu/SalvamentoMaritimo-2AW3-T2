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
        Schema::create('travel', function (Blueprint $table) {
            $table->id();
            $table->string('origen');
            $table->string('destino');
            $table->foreignId('doctor_id');
            $table->foreignId('kapitaina_id');
            $table->foreignId('makinen_arduraduna_id');
            $table->foreignId('mekanikoa_id');
            $table->foreignId('zubiko_ofiziala_id');
            $table->foreignId('marinela_1_id');
            $table->foreignId('marinela_2_id');
            $table->foreignId('marinela_3_id');
            $table->foreignId('erizaina_id');
            $table->date('start_date');
            $table->string('description', 1000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel');
    }
};
