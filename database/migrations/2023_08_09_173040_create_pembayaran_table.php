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
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->bigInteger('id_sewa')->unsigned()->nullable();
            $table->integer('total');
            $table->date('tgl_pembayaran');
            $table->string('status_pembayaran');
            $table->timestamps();
        });

        Schema::table('pembayaran', function($table) {
            $table->foreign('id_sewa')->references('id_sewa')->on('penyewaan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayaran');
    }
};
