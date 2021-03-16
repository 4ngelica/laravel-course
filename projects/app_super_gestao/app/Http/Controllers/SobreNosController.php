<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function callbackSobreNos(){
      echo "Sobre nós";
    }

    public function sobreNos(){
      return view('site.sobre-nos');
    }
}
