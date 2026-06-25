<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('order_id', 50);
            $table->string('status', 20);
            $table->string('payment_type', 20);
            $table->integer('amount');
            $table->dateTime('transaction_time');
            $table->string('username')->nullable();
            $table->string('seat_number')->nullable();
            $table->string('nama_film', 50)->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
