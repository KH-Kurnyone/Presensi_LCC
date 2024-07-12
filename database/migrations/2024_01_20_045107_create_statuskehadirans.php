<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatuskehadirans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statuskehadirans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kehadiran_id');
            // $table->foreignId('prodi_id');
            // $table->foreignId('kelas_id');
            $table->foreignId('mahasiswa_id');
            $table->enum('status_kehadiran',['Hadir','Sakit','Izin','Alfa']);
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
        Schema::dropIfExists('statuskehadirans');
    }
}
