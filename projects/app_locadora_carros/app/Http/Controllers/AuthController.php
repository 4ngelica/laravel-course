<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request){
      $credentials = $request->all(['email', 'password']);
      $token = auth('api')->attempt($credentials);
      if($token){
        return response()->json(['token' => $token]);
      }else{
        return response()->json(['error'=> 'Usuário ou senha inválido.'], 403);
      }

      return 'login';
    }

    public function logout() {
        auth('api')->logout();
        return response()->json(['msg' => 'Logout foi realizado com sucesso!']);
    }

    public function refresh() {
        $token = auth('api')->refresh(); //cliente encaminhe um jwt válido
        return response()->json(['token' => $token]);
    }

    public function me() {
        return response()->json(auth()->user());
    }
}
