<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller{

    public function index(){
        $client = new \GuzzleHttp\Client(["verify" => false]);
        $response = json_decode($client->request('GET', 'https://api.github.com/users?since=2019')->getBody());
        $dados = array($response);
        // dd($dados);
        return view('site.index')->with('dados',$dados);
    }
    //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
    public function indexCadastro(){
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
