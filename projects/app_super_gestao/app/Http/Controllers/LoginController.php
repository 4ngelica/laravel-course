<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
      $erro = '';
      if ($request->get('erro') ==1) {
        $erro = "O usuário ou senha não existe";
      }
      return view('site.login', ['titulo'=> 'login', 'erro' => $erro]);
    }

    public function autenticar(Request $request){
      $request->validate([
        'usuario' => 'email',
        'senha' => 'required'
      ]);

      $email = $request->get('usuario');
      $senha = $request->get('senha');

      $user = new User();
      $usuario = $user->where('email', $email)
                      ->where('password', $senha)
                      ->get()
                      ->first();
    if (isset($usuario->name)) {

    }else{
      return redirect()->route('site.login',['erro'=> 1]);
    }
    }
}
