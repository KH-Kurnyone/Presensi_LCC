<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kelas() {
        return $this->hasMany(Kelas::class,'prodi_id','id');
    }

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class,'prodi_id','id');
    }

    public function jadwal() {
        return $this->hasMany(Jadwal::class,'prodi_id','id');
    }
}
