<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKontrakanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kontrakan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemilik');
            $table->foreign('id_pemilik')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('nama');
            $table->integer('harga');
            $table->string('lokasi');
            $table->string('aturan');
            $table->string('fasilitas');
            $table->string('foto')->nullable();
            $table->string('tipe');
            $table->integer('jumlah_kamar');
            $table->string('ukuran');
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
        Schema::dropIfExists('kontrakan');
    }
}
