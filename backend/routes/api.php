<?php

use App\Http\Controllers\DispositivoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getBodegas', [DispositivoController::class, 'getBodegas']);
Route::get('/getDispositivo', [DispositivoController::class, 'getDispositivo']);
Route::get('/getMarcas', [DispositivoController::class, 'getMarcas']);
Route::get('/getModelofMarca', [DispositivoController::class, 'getModelofMarca']);
