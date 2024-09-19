<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sesi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sesiDet()
    {
        return $this->hasMany(SesiDet::class, 'sesi_id', 'id');
    }
}
