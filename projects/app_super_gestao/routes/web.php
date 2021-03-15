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

Route::get('/', 'PrincipalController@principal');
Route::get('/vista-principal', 'PrincipalController@vistaPrincipal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');
Route::get('/vista-sobre-nos', 'SobreNosController@vistaSobreNos');

Route::get('/contato', 'ContatoController@contato');
Route::get('/vista-contato', 'ContatoController@vistaContato');
