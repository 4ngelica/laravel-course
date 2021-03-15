<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function contato(){
      echo 'contato';
    }

    public function vistaContato(){
      return view('site.contato');
    }
}
