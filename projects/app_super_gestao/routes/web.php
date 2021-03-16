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


//Definindo rotas (que apontam para vistas ou apenas para msgs de callback)
Route::get('/', 'PrincipalController@principal');
Route::get('/vista-principal', 'PrincipalController@vistaPrincipal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');
Route::get('/vista-sobre-nos', 'SobreNosController@vistaSobreNos');

Route::get('/contato', 'ContatoController@contato');
Route::get('/vista-contato', 'ContatoController@vistaContato');

//Definindo rotas com parâmetros
Route::get('/vista-contato/{nome}/{categoria}/{assunto}/{mensagem}',
  function(string $nome, string $categoria, string $assunto, string $mensagem) {
    echo "Rota com parâmetro: $nome - $categoria - $assunto - $mensagem";
  }
);
