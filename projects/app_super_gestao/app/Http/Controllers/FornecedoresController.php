<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){
      $fornecedores = ['1 fornecedor'];

      $fornecedores2 = [
        0 => ['nome' => 'Fornecedor 1', 'status' => 'N']
      ];

      return view('app.fornecedores', compact('fornecedores'), compact('fornecedores2'));
    }
}
