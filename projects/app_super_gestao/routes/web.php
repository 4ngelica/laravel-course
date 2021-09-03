<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;

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
  //Vistas
  Route::get('/', 'PrincipalController@principal')->name("site.index")->middleware('log.acesso');
  Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name("site.sobrenos");
  Route::get('/contato', 'ContatoController@contato')->name("site.contato");
  Route::post('/contato', 'ContatoController@salvar')->name("site.salvar");
  Route::get('/login/{erro?}', 'LoginController@index')->name("site.login");
  Route::post('/login', 'LoginController@autenticar')->name("site.login");


    //Agrupando e nomeando rotas
    Route::middleware('autenticacao:padrao,visitante,p3,p4')->prefix('/app')->group(function(){
      Route::get('/home', 'HomeController@index')->name("app.home");
      Route::get('/sair', 'LoginController@sair')->name("app.sair");
      //Fornecedor
      Route::get('/fornecedor', 'FornecedorController@index')->name("app.fornecedor");
      Route::post('/fornecedor/listar', 'FornecedorController@listar')->name("app.fornecedor.listar");
      Route::get('/fornecedor/listar', 'FornecedorController@listar')->name("app.fornecedor.listar");
      Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name("app.fornecedor.adicionar");
      Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name("app.fornecedor.adicionar");
      Route::get('/fornecedor/editar/{id}/{msg?}', 'FornecedorController@editar')->name("app.fornecedor.editar");
      Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name("app.fornecedor.excluir");

      //Produto
      Route::resource('produto', 'ProdutoController');

      //Produtos detalhes
      Route::resource('produto-detalhe', 'ProdutoDetalheController');

      Route::resource('cliente', 'ClienteController');
      Route::resource('pedido', 'PedidoController');

      //Route::resource('pedido-produto', 'PedidoProdutoController');
      Route::get('pedido-produto/create/{pedido}', 'PedidoProdutoController@create')->name("pedido-produto.create");
      Route::post('pedido-produto/store/{pedido}', 'PedidoProdutoController@store')->name("pedido-produto.store");


  });

  //Msgs de callback
  Route::get('/callback-principal', 'PrincipalController@callbackPrincipal');
  Route::get('/callback-sobre-nos', 'SobreNosController@callbackSobreNos');
  Route::get('/callback-contato', 'ContatoController@callbackContato');


//Definindo rotas de teste
  //Definindo rota com parâmetros
  Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem}',
    function(string $nome, string $categoria, string $assunto, string $mensagem) {
      echo "Rota com parâmetro: $nome - $categoria - $assunto - $mensagem";
    }
  );

  //Definindo rota com parâmetros opcionais
  Route::get('/callback-sobre-nos/{nome?}/{categoria?}/{assunto?}/{mensagem?}',
    function( string $nome = 'Nome não informado',
              string $categoria = 'Categoria não informada',
              string $assunto = 'Assunto não informado',
              string $mensagem = 'Mensagem não informada') {
      echo "Rota com parâmetro: $nome - $categoria - $assunto - $mensagem";
    }
  );

  //Tratando parâmetros de rota com regex
  Route::get('/callback-contato/{nome?}/{categoria_id?}',
    function( string $nome = 'Nome não informado',
              int $categoria_id = 0) {

      echo "Rota com parâmetro: $nome - $categoria_id";
    }
  )->where('categoria_id', '[0-9]+')->where('nome', '[A-Za-z]+');

  //Redirecionando rotas
  Route::get('/rota1',function(){echo "Rota1";})->name("site.rota1");
  Route::get('/rota2',function(){return redirect()->route("site.rota1");})->name("site.rota2");

  //ou: Route::redirect('/rota2','/rota1')

  //Rota de fallback (redirecionar ao acessar uma rota inexistente)
  Route::fallback(function() {
    echo "A rota acessada não existe. <a href=" . route('site.index') ."> Clique aqui</a> para voltar para a página principal.";
  });

  //Encaminhando parâmetros de rota para o controlador
  Route::get('/teste/{p1}/{p2}','TesteController@teste')->name('teste');
