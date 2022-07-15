<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumnoController;

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

Route::get('/alumnos',[AlumnoController::class,'index']);
Route::post('/alumnos',[AlumnoController::class,'create']);
Route::put('/alumnos/{id}',[AlumnoController::class,'update']);
Route::get('/alumnos/{id}',[AlumnoController::class,'show']);
Route::delete('/alumnos/{id}',[AlumnoController::class,'delete']);

Route::get('/datos_obtenidos',[AlumnoController::class,'datos_obtenidos']);
Route::post('/datos_obtenidos',[AlumnoController::class,'create']);
