<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function prodi() {
        return $this->belongsTo(Prodi::class,'prodi_id','id');
    }

    public function mahasiswa() {
        return $this->hasMany(Mahasiswa::class,'kelas_id','id');
    }

    public function jadwal() {
        return $this->hasMany(Jadwal::class,'kelas_id','id');
    }
}
