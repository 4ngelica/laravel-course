<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function callbackContato(){
      echo 'contato';
    }

    public function contato(){
      return view('site.contato');
    }
}
