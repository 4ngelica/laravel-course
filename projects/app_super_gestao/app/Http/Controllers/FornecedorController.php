<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;


class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->paginate(1);
        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request' => $request->all()]);
    }

    public function adicionar(Request $request) {
      $msg='';
        if ($request ->input('_token') != '' && $request->input('id') == '') {
          // Validação
          $regras = [
            'nome' => 'required|min:3|max:40',
            'site' => 'required',
            'uf' => 'required|min:2|max:2',
            'email' => 'required|email'
          ];
          $request->validate($regras);
          $fornecedor = new Fornecedor();
          $fornecedor->create($request->all());

          $msg= "Cadastro realizado com sucesso!";
        }

        //Edição
        if ($request ->input('_token') != '' && $request->input('id') != '') {
          $fornecedor = Fornecedor::find($request->id);
          $update = $fornecedor->update($request->all());

          if ($update) {
            $msg = 'Atualização realizada com sucesso!';
          }else{
            $msg = 'Erro ao tentar atualizar o registro.';
          }
          return redirect()->route('app.fornecedor.editar', ['msg'=>$msg, 'id' => $request->input('id')]);

        }
        return view('app.fornecedor.adicionar', ['msg'=>$msg]);
    }

    public function editar($id, $msg = '') {

      $fornecedor = Fornecedor::find($id);

      return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msg' => $msg]);
      view('app.fornecedor.adicionar', ['msg'=>$msg]);
    }
}
