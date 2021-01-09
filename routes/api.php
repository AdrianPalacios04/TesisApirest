<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\TratamientoController;
use App\Http\Controllers\API\GrupoController;


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
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
        Route::post('/reserva', 'API\ReservaController@store');
        //Route::post('groups/{id}/join', 'GroupController@join');

        //Route::middleware('group-member')->group(function () {
      //  Route::get('notes', 'NoteController@index');
            //Route::get('notes/{id}', 'NoteController@show');
           // Route::post('notes', 'NoteController@store');
        //});
});

Route::get('/grupo','API\GrupoController@index');
Route::post('/grupo','API\GrupoController@store');
Route::resource('/servicio','API\ServicioController');

Route::resource('salones','API\SalonesController');
