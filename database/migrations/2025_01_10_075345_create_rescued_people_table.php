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
        Schema::create('rescued_people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('genre');
            $table->date('birth_date');
            $table->foreignId('rescue_id');
            $table->foreignId('doctor_id');
            $table->string('diagnostic');
            $table->string('photo_src');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rescued_people');
    }
};
