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
        Schema::create('pengembalian', function (Blueprint $table) {
            $table->bigIncrements('id_pengembalian');
            $table->bigInteger('id_sewa')->unsigned()->nullable();
            $table->string('total_bayar');
            $table->date('tgl_ambil');
            $table->date('tgl_kembali');
            $table->string('denda');
            $table->string('status_pengembalian');
            $table->timestamps();
        });

        Schema::table('pengembalian', function($table) {
            $table->foreign('id_sewa')->references('id_sewa')->on('penyewaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengembalian');
    }
};
