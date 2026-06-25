<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('films', function (Blueprint $table) {
            $table->id();
            $table->string('poster');
            $table->string('banner');
            $table->string('trailer');
            $table->string('nama_film', 100);
            $table->longText('judul');
            $table->string('total_menit');
            $table->string('usia');
            $table->string('genre');
            $table->string('dimensi');
            $table->string('Producer');
            $table->string('Director');
            $table->string('Writer');
            $table->string('Cast');
            $table->string('Distributor');
            $table->string('harga')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('films');
    }
};
