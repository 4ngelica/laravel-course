<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;


class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar() {
        return view('app.fornecedor.listar');
    }

    public function adicionar(Request $request) {
      $msg='';
        if ($request ->input('_token') != '') {
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
        return view('app.fornecedor.adicionar', ['msg'=>$msg]);
    }
}
