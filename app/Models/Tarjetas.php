<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjetas extends Model
{
    use HasFactory;
    protected $table = 'tarjetas_de_regalo';

    public function usuario(){

        return $this->hasOne(User::class,'id','created_by');
    }

    public function estatus(){
        return $this->hasOne(EstatusTarjetas::class, 'id', 'estatus_tarjetas_id');
    }

}
