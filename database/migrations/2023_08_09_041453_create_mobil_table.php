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
        Schema::create('mobil', function (Blueprint $table) {
            $table->bigIncrements('id_mobil');
            $table->bigInteger('id_tarif')->unsigned()->nullable();
            $table->string('nama_mobil');
            $table->string('warna');
            $table->string('tahun_mobil');
            $table->string('no_pol');
            $table->string('kapasitas_penumpang');
            $table->string('kapasitas_mesin');
            $table->string('gambar_mobil')->nullable();
            $table->timestamps();
        });

        Schema::table('mobil', function($table) {
            $table->foreign('id_tarif')->references('id_tarif')->on('tarif');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobil');
    }
};
