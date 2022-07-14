<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Marca;
use App\Models\Modelo;
use Illuminate\Http\Request;

class DispositivoController extends Controller
{
    /**
     * 1.2 Desarrollar en el backend una API que permita:
     * 1. Listar las marcas (id, nombre)
     */
    public function getMarcas(){
        $response = Marca::select('id','nombre')->get();
        return $response;
    }

    /**
     * 1.2 Desarrollar en el backend una API que permita:
     * 2. Listar modelos de una marca (id, nombre, marca)
     */
    public function getModelofMarca(Request $request){
        $response = Modelo::select('id','nombre')->where('id_marca', $request->id_marca)->get();
        return $response;
    }

    /**
     * 1.2 Desarrollar en el backend una API que permita:
     * 3. Listar dispositivos de un modelo o marca (id, nombre, modelo, marca)
     */
    public function getDispositivo(Request $request){
        $marca = $request->id_marca;
        $modelo = $request->id_modelo;
        $bodega = $request->id_bodega;

        $response = Dispositivo::when($bodega, function ($query, $bodega){
            $query->where('id_bodega', $bodega);
        })->where('id_modelo', $modelo)->orWhereHas('modelo', function ($query) use ($marca) {
            $query->where('id_marca', $marca);
        })->with('modelo','modelo.marca')->get();

        return $response;
    }
}
