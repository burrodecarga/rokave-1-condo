<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    use HasFactory;

    public function administrador(){
        return $this->belongsTo(User::class,'administrador_id');
    }
}
