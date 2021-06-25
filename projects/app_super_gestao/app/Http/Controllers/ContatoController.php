<?php

namespace App\Http\Controllers;
use App\SiteContato;
use App\MotivoContato;



use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function callbackContato(){
      echo 'contato';
    }

    public function contato(){
      $motivo_contatos = MotivoContato::all();
      return view('site.contato', ['titulo'=>'Contato (teste)', 'motivo_contatos'=>$motivo_contatos]);
    }

    public function salvar(Request $request){


      $request->validate([
        'nome' => 'required|min:3|max:40|unique:site_contatos',
        'telefone' => 'required',
        'email' => 'required|email',
        'motivo_contatos_id' => 'required',
        'mensagem' => 'required'
      ],
      [
        'nome.required' => 'O campo nome precisa ser preenchido'
      ]);

      $motivo_contatos = MotivoContato::all();


      // $contato = new SiteContato();

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
      return redirect()->route('site.index');
}
}
