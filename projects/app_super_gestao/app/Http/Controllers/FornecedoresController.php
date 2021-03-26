<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){

      //Estudo da sintaxe da blade
      $fornecedores = ['1 fornecedor'];

      $fornecedores2 = [
        0 => ['nome' => 'Fornecedor 1', 'status' => 'N', 'ddd' => '11'],
        1 => ['nome' => 'Fornecedor 2', 'status' => 'S', 'cnpj' => NULL, 'ddd' => '85']
      ];

      $fornecedores3 = [
        0 => ['nome' => 'Fornecedor 1', 'status' => 'N', 'cnpj' => '26127831792831', 'ddd' => '11'],
        1 => ['nome' => 'Fornecedor 2', 'status' => 'S', 'cnpj' => NULL, 'ddd' => '85'],
        2 => ['nome' => 'Fornecedor 3', 'status' => 'S', 'cnpj' => '22763423692831', 'ddd' => '55']
      ];

      //Operador ternário
      echo isset($fornecedores2[0]['cnpj']) ? 'CNPJ informado' : 'CNPJ inexistente';
      return view('app.fornecedores', compact('fornecedores','fornecedores2', 'fornecedores3'));

    }
}
