<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedoresController extends Controller
{
    public function index(){
      $fornecedores = ['1 fornecedor'];

      return view('app.fornecedores', compact('fornecedores'));
    }
}