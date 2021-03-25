<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){

      //Estudo da sintaxe da blade
      $fornecedores = ['1 fornecedor'];

      $fornecedores2 = [
        0 => ['nome' => 'Fornecedor 1', 'status' => 'N'],
        1 => ['nome' => 'Fornecedor 2', 'status' => 'S', 'cnpj' => '']
      ];

      //Operador ternário
      echo isset($fornecedores2[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ inexistente';

      return view('app.fornecedores', compact('fornecedores'), compact('fornecedores2'));
    }
}
