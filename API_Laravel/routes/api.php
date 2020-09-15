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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Route::get('/ok', function (){
//    return ['status'=> true];
//});

Route::group(['namespace' => 'Api'], function(){
	Route::prefix('jornalistas')->group(function(){

        Route::get('/', 'JornalistaController@index')->name('index_jornalistas');
        Route::get('/{id}', 'JornalistaController@consultar')->name('consultar_jornalistas');

        //Usando o post é possível salvar um novo jornalista
        Route::post('/', 'JornalistaController@store')->name('store_jornalistas');

        //Usando o post é possível atualizar um novo jornalista
        Route::put('/{id}', 'JornalistaController@update')->name('update_jornalistas');

        //Usando o post é possível deletar um novo jornalista
        Route::delete('/{id}', 'JornalistaController@delete')->name('delete_jornalistas');        
	});
});

Route::group(['namespace' => 'Api'], function(){
	Route::prefix('artigos')->group(function(){

        //Definições dos acessos HTTP
        Route::get('/', 'ArtigoController@index')->name('index_artigos');

        //Lista todos os artigos publicados (1) ou não publicados (0)
        Route::get('/listPorStatus/{id}', 'ArtigoController@listPorStatus')->name('list_artigos');

        Route::get('/{id}', 'ArtigoController@consultar')->name('consultar_artigos');

        //Usando o post é possível salvar um novo ARTIGO
        Route::post('/', 'ArtigoController@store')->name('store_artigos');

        //Usando o post é possível atualizar um novo ARTIGO
        Route::put('/{id}', 'ArtigoController@update')->name('update_artigos');

        //Usando o post é possível deletar um novo ARTIGO
        Route::delete('/{id}', 'ArtigoController@delete')->name('delete_artigos');
	});
});