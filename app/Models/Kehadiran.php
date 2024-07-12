<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kehadiran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function statuskehadiran() {
        return $this->hasMany(Statuskehadiran::class,'kehadiran_id','id');
    }
    public function user() {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function kegiatan() {
        return $this->belongsTo(Kegiatan::class,'kegiatan_id','id');
    }

}
