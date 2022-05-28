<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canjeos extends Model
{
    use HasFactory;

    public function cupon(){
        return $this->hasOne(Tarjetas::class,'id', 'tarjetas_de_regalo_id');
    }
}
