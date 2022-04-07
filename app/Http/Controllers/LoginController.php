<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('site.login');
    }

    public function autenticar(Request $request){

        // return view('site.login');
        $regras = ['usuario'=>'email', 'senha' => 'required'];

        $feedback = [
            'usuario.email' => 'O campo usuário (e-mail) é obrigatório',
            'usuario.senha' => 'O campo senha é obrigatória'
        ];

        $request->validate($regras, $feedback);
        print_r($request->all());

    }
}
