<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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

        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->tipo = '2';
        $usuario->password =  Hash::make($request->input('password'));

        $usuario->save();

        return view('site.cadastro');
    }
}
