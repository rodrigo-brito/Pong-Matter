<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


/*
 *  Rota inicial
 */
Route::get('/', ["as" => "/", function () {
        return view('index');
    }]);
    
/*
 *  Rotas do jogador
 */
Route::group(['prefix' => 'jogador'], function () {
    Route::get('/', ['as' => 'jogador', 'uses' => 'JogadorController@index']);
    
    Route::get('/cadastrar', ['as' => 'jogador.cadastrar', 'uses' => 'JogadorController@cadastrar']);
    Route::get('/editar/{id}', ['as' => 'jogador.editar', 'uses' => 'JogadorController@edit']);
    
    Route::post('/salvar', ['as' => 'jogador.salvar', 'uses' => 'JogadorController@store']);
    Route::post('/atualizar', ['as' => 'jogador.atualizar', 'uses' => 'JogadorController@update']);
    Route::get('/excluir/{id}', ['as' => 'jogador.excluir', 'uses' => 'JogadorController@destroy']);
    
});

/*
 *  Rotas do campeonato
 */
Route::group(['prefix' => 'campeonato'], function () {
    // rota principal
    Route::get('/', ['as' => 'campeonato', 'uses' => 'CampeonatoController@index']);
    
    Route::get('/editar/{id}', ['as' => 'campeonato.editar', 'uses' => 'CampeonatoController@edit']);
    
    Route::post('/atualizar', ['as' => 'campeonato.atualizar', 'uses' => 'CampeonatoController@update']);
    
    Route::get('/reiniciar', ['as' => 'campeonato.reiniciar', 'uses' => 'CampeonatoController@restart']);
});
