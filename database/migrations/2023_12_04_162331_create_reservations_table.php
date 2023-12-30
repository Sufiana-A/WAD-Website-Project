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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('layanan');
            $table->string('keberangkatan');
            $table->string('destinasi_hotel');
            $table->date('keberangkatan_checkin');
            $table->date('kepulangan_checkout');
            $table->integer('quantity');
            $table->integer('booking_code')->nullable();
            $table->string('duduk_kamar');
            $table->integer('biaya')->nullable();
            $table->string('status');
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
