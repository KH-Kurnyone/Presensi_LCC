<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }

    public function user()
    {
        return $this->hasMany(User::class, 'mahasiswa_id', 'id');
    }

    public function kehadiran()
    {
        return $this->hasMany(Kehadiran::class, 'mahasiswa_id', 'id');
    }

    public function status_kehadiran()
    {
        return $this->hasMany(Statuskehadiran::class, 'mahasiswa_id', 'id');
    }
}
