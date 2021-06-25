<?php

namespace App\Http\Controllers;
use App\SiteContato;


use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function callbackContato(){
      echo 'contato';
    }

    public function contato(){
      $motivo_contatos = [
        '1' => 'Dúvida',
        '2' => 'Elogio',
        '3' => 'Reclamação'
      ];
      return view('site.contato', ['titulo'=>'Contato (teste)', 'motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){


      $request->validate([
        'nome' => 'required|min:3|max:40',
        'telefone' => 'required',
        'email' => 'required',
        'motivo_contato' => 'required',
        'mensagem' => 'required'
      ]);

      $motivo_contatos = [
        '1' => 'Dúvida',
        '2' => 'Elogio',
        '3' => 'Reclamação'
      ];

      $contato = new SiteContato();

      //primeiro método
      // $contato->nome = $request->input('nome');
      // $contato->telefone = $request->input('telefone');
      // $contato->email = $request->input('email');
      // $contato->motivo_contato = $request->input('motivo_contato');
      // $contato->mensagem = $request->input('mensagem');


      //segundo método
      // $contato->fill($request->all());
      // $contato->save();

      //terceiro método
      SiteContato::create($request->all());
      return view('site.contato', ['titulo'=>'Contato (teste)', 'motivo_contatos'=>$motivo_contatos]);
    }
}
