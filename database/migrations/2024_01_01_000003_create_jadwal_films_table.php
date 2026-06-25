<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_films', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mall_id')->constrained('malls')->cascadeOnDelete();
            $table->foreignId('film_id')->constrained('films')->cascadeOnDelete();
            $table->string('studio');
            $table->time('jam_tayang_1');
            $table->time('jam_tayang_2')->nullable();
            $table->time('jam_tayang_3')->nullable();
            $table->date('tanggal_tayang');
            $table->date('tanggal_akhir_tayang');
            $table->string('total_menit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_films');
    }
};
