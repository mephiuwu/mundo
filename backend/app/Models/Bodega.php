<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    use HasFactory;
    protected $table = "bodega";
    protected $fillable = ['nombre'];

    public function dispositivo(){
        return $this->hasMany(Dispositivo::class,'id_bodega');
    }
}
