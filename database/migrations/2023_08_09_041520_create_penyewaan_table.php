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
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->bigIncrements('id_sewa');
            $table->bigInteger('id_mobil')->unsigned()->nullable();
            $table->bigInteger('id_pelanggan')->unsigned()->nullable();
            $table->date('tgl_ambil')->nullable();
            $table->date('tgl_kembali')->nullable();
            $table->string('total_sewa')->nullable();
            $table->integer('denda/jam')->nullable();
            $table->integer('total_denda')->nullable();
            $table->integer('status_penyewaan')->nullable();
            $table->timestamps();
        });

        Schema::table('penyewaan', function($table) {
            $table->foreign('id_pelanggan')->references('id_pelanggan')->on('pelanggan');
            $table->foreign('id_mobil')->references('id_mobil')->on('mobil');
        
        });

        


    }

   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyewaan');
    }
};
