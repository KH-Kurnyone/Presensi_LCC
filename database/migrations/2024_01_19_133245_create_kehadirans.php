<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehadirans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('kegiatan_id');
            $table->date('tanggal');
            // $table->enum('pertemuan',['01','02','03','04','05']);
            // $table->enum('nama_kegiatan',['Office Class','Multimedia Class','Programing Class']);
            $table->string('ket_kegiatan','100');
            $table->enum('status',['Aktif','Non Aktif']);
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
        Schema::dropIfExists('kehadirans');
    }
}
