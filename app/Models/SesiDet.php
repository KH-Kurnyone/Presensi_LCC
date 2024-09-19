<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SesiDet extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sesi()
    {
        return $this->belongsTo(Sesi::class, 'sesi_id', 'id');
    }

    public function kehadiran()
    {
        return $this->belongsTo(Kehadiran::class, 'kehadiran_id', 'id');
    }
}
