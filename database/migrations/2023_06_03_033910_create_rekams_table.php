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
        Schema::create('rekam', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nama_pasien')->on('pasien');
            $table->string('keluhan', 100);
            $table->date('tgl');
            $table->foreignId('nama_dokter')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rekams');
    }
};
