<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('prodi_id');
            // $table->string('barcode');
            $table->foreignId('kelas_id');
            $table->integer('nim');
            $table->string('nama','100');
            $table->enum('jenis_kelamin',['Laki-Laki','Perempuan']);
            $table->string('tempat_lahir','100');
            $table->date('tanggal_lahir');
            $table->text('alamat');
            $table->string('asal_sekolah','100');
            $table->string('jurusan','100');
            $table->string('no_telpon','15');
            $table->enum('status_ukm',['Anggota LCC','Bukan Anggota']);
            $table->enum('tingkat',['1','2','3','4']);
            $table->string('angkatan', '5');
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
        Schema::dropIfExists('mahasiswas');
    }
}
