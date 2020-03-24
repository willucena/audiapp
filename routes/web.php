<?php

use Illuminate\Support\Facades\Route;


Route::get('/','HomeController@index');

Route::group(['prefix'=>'audiencia'], function (){
    Route::get('/','AudienciaController@index');
});

Route::group(['prefix'=>'processo'], function (){
    Route::get('/','ProcessoController@index');
    Route::post('salvar','ProcessoController@salvar');
    Route::get('editar/{id}','ProcessoController@editar');
    Route::get('remover/{id}','ProcessoController@remover');
    Route::get('/{numero}','ProcessoController@buscar');
});
