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
            $table->foreignId('mahasiswa_id');
            $table->foreignId('kegiatan_id');
            $table->date('tanggal');
            $table->text('ket_kegiatan');
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
