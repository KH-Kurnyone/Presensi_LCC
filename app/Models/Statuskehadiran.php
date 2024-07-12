<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statuskehadiran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function kehadiran() {
        return $this->belongsTo(Kehadiran::class,'kehadiran_id','id');
    }

    public function mahasiswa() {
        return $this->belongsTo(Mahasiswa::class,'mahasiswa_id','id');
    }
    
}
