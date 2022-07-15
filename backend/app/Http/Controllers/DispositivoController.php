<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
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
        try {
            $response = Marca::select('id','nombre')->get();

            return response()->json(['status'=>true, 'data'=> $response]);
        } catch (\Throwable $err) {
            return response()->json(['status'=>false, 'mensaje'=>$err->getMessage()]);
        }
        
    }

    /**
     * 1.2 Desarrollar en el backend una API que permita:
     * 2. Listar modelos de una marca (id, nombre, marca)
     */
    public function getModelofMarca(Request $request){
        try {
            $response = Modelo::select('id','nombre')->where('id_marca', $request->marca)->get();

            return response()->json(['status'=>true, 'data'=> $response]);
        } catch (\Throwable $err) {
            return response()->json(['status'=>false, 'mensaje'=>$err->getMessage()]);
        }
    }

    /**
     * 1.2 Desarrollar en el backend una API que permita:
     * 3 y 4. Listar dispositivos de un modelo o marca (id, nombre, modelo, marca)
     */
    public function getDispositivo(Request $request){
        try {

            $bodega = $request->bodega;
            $modelo = $request->model;
            $marca = $request->marca;
            
            $response = Dispositivo::when($bodega, function ($query, $bodega){
                $query->where('id_bodega', $bodega);
            })
            ->when($modelo, function ($query, $modelo){
                $query->where('id_modelo', $modelo);
            })
            ->when($marca, function ($query, $marca){
                $query->whereHas('modelo', function ($query) use ($marca) {
                    $query->where('id_marca', $marca);
                });
            })
            ->with('bodega','modelo.marca')->get();

            return response()->json(['status'=>true, 'data'=> $response]);
        } catch (\Throwable $err) {
            return response()->json(['status'=>false, 'mensaje'=>$err->getMessage()]);
        }
        
    }

    public function getBodegas(){
        try {
            $bodegas = Bodega::all();

            return response()->json(['status'=>true, 'data'=> $bodegas]);
        } catch (\Throwable $err) {
            return response()->json(['status'=>false, 'mensaje'=>$err->getMessage()]);
        }
    }
}
