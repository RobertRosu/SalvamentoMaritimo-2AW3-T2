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
            $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
            $table->foreignId('kapitaina_id')->constrained()->onDelete('cascade');
            $table->foreignId('makinen_arduraduna_id')->constrained()->onDelete('cascade');
            $table->foreignId('mekanikoa_id')->constrained()->onDelete('cascade');
            $table->foreignId('zubiko_ofiziala_id')->constrained()->onDelete('cascade');
            $table->foreignId('marinela_1_id')->constrained()->onDelete('cascade');
            $table->foreignId('marinela_2_id')->constrained()->onDelete('cascade');
            $table->foreignId('marinela_3_id')->constrained()->onDelete('cascade');
            $table->foreignId('erizaina_id')->constrained()->onDelete('cascade');
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
