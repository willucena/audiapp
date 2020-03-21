<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index');


Route::group(['prefix'=>'processo'], function (){
    Route::get('/','ProcessoController@index');
    Route::post('salvar','ProcessoController@salvar');
    Route::get('editar/{id}','ProcessoController@editar');
    Route::get('remover/{id}','ProcessoController@remover');
});
