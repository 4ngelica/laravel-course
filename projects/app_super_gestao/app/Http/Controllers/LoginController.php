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
      if ($request->get('erro') ==2) {
        $erro = "Login obrigatório";
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
      session_start();
      $_SESSION['nome'] = $usuario->name;
      $_SESSION['email'] = $usuario->email;
      return redirect()->route('app.cliente');

    }else{
      return redirect()->route('site.login',['erro'=> 1]);
    }
    }

    public function sair(){
      session_destroy();
      return redirect()->route('site.index');
    }
}
