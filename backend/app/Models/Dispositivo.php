<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dispositivo extends Model
{
    use HasFactory;
    protected $table = "dispositivo";
    protected $fillable = ['nombre', 'id_modelo', 'id_bodega'];

    public function bodega(){
        return $this->belongsTo(Bodega::class,'id_bodega');
    }

    public function modelo(){
        return $this->belongsTo(Modelo::class,'id_modelo');
    }
}
