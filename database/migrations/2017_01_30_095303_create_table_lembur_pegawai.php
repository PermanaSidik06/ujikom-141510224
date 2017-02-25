<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLemburPegawai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lembur_pegawai', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_lembur_id')->unsigned();
            $table->foreign('kode_lembur_id')->references('id')->on('kategori_lembur')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->integer('pegawai_id')->unsigned();
            $table->foreign('pegawai_id')->references('id')->on('pegawai')->OnDelete('cascade')->OnUpdate('cascade');
            $table->integer('jumlah_jam');
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
        Schema::dropIfExists('lembur_pegawai');
    }
}
