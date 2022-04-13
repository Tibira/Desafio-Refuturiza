<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class UsuarioController extends Controller{

    public function index(){

        $client = new \GuzzleHttp\Client(["verify" => false]);
        $response = json_decode($client->request('GET', 'https://api.github.com/users?since=XXX')->getBody());
        $response = $this->paginate($response);
        return view('site.index')->with('dados',$response);
    }

    public function indexCadastro(){
        return view('site.cadastro');
    }

    public function paginate($items, $perPage = 10, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function desenvolvedor(int $id){
        $client = new \GuzzleHttp\Client(["verify" => false]);
        $response = json_decode($client->request('GET', "https://api.github.com/user/$id")->getBody());

        return view('site.cadastro')->with('dados', $dados);
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
