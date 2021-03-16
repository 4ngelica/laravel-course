<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrincipalController extends Controller
{
  public function VistaPrincipal(){
    echo "Welcome!";
  }

  public function principal(){
    return view('site.principal');
  }
}
