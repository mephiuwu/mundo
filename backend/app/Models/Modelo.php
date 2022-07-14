<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;
    protected $table = "modelo";
    protected $fillable = ['nombre', 'id_marca'];

    public function marca(){
        return $this->belongsTo(Marca::class,'id_marca');
    }

    public function dispositivos(){
        return $this->hasMany(Dispositivo::class,'id_modelo');
    }
}
