<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pencari');
            $table->unsignedBigInteger('id_kos')->nullable();
            $table->unsignedBigInteger('id_kontrakan')->nullable();
            $table->unsignedBigInteger('id_penginapan')->nullable();
            $table->foreign('id_pencari')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kos')->references('id')->on('kos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kontrakan')->references('id')->on('kontrakan')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_penginapan')->references('id')->on('penginapan')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('biaya_sewa')->nullable();
            $table->date('mulai_sewa')->nullable();
            $table->date('akhir_sewa')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi');
    }
}
