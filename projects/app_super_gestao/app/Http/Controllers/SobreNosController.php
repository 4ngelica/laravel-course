<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function sobreNos(){
      echo "Sobre nós";
    }

    public function vistaSobreNos(){
      return view('site.sobre-nos');
    }
}
