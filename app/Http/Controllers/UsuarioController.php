<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuarioController extends Controller{

    public function index(){
        return view('site.cadastro');
    }

    public function cadastro(Request $request){

        $request->validate([
            'name' => 'required|min:3|max:40',
            'email' => 'required',
            'password' => 'required'
        ]);

        $usuario = new User();

        $usuario->create($request->all());

        return view('site.cadastro');
    }
}
