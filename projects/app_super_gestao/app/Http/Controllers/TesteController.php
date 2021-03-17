<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste (int $p1, int $p2){
      // echo "A soma dos parâmetros $p1 e $p2 é: "  .($p1+$p2);

      //Retorna os valores dos parâmetros na view através dos arrays associativos
      // return view('site.teste',['p1'=>$p1, 'p2'=> $p2]);

      //Retorna os valores dos parâmetros na view através do compact
      // return view('site.teste', compact('p1','p2'));

      //Retorna os valores dos parâmetros na view através de with
      return view('site.teste')->with('p1' , $p1)->with('p2' , $p2);
    }
}
