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

//Definindo rota com parâmetros
Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem}',
  function(string $nome, string $categoria, string $assunto, string $mensagem) {
    echo "Rota com parâmetro: $nome - $categoria - $assunto - $mensagem";
  }
);

//Definindo rota com parâmetros opcionais
Route::get('/sobre-nos/{nome?}/{categoria?}/{assunto?}/{mensagem?}',
  function( string $nome = 'Nome não informado',
            string $categoria = 'Categoria não informada',
            string $assunto = 'Assunto não informado',
            string $mensagem = 'Mensagem não informada') {
    echo "Rota com parâmetro: $nome - $categoria - $assunto - $mensagem";
  }
);

//Tratando parâmetros de rota com regex
Route::get('/vista-contato/{nome?}/{categoria_id?}',
  function( string $nome = 'Nome não informado',
            int $categoria_id = 0) {

    echo "Rota com parâmetro: $nome - $categoria_id";
  }
)->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');
