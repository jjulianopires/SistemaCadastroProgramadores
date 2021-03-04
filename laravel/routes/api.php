<?php

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

Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
        'prefix'     => 'auth',
    ],
    function ($router) {
        Route::post('login', 'AuthController@login');
        Route::post('logout', 'AuthController@logout');
    }
);

Route::group(
    [
        'middleware' => 'api',
        'namespace'  => 'App\Http\Controllers',
    ],
    function ($router) {
        // Route::get('home', function () {
        //     return response()->json(['success' => 'success'], 200);
        // })->middleware('auth:api');
        Route::resource('candidatos', 'CandidatoController');
        Route::post('candidato/salvar', 'CandidatoController@store');
        Route::get('candidato/excluir/{id}', 'CandidatoController@delete');
        Route::post('candidato/atualizar', 'CandidatoController@update');
        Route::get('candidato/buscar/{id}', 'CandidatoController@show');

    }
);
