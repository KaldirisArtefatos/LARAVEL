<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PessoasController extends Controller
{

    public function listar(){
        $pessoas = ["Ela", "Ele", "Nozes"];
        // return view('usuarios.index',['usuarios'=>$usuarios]);
        // OU DA FORMA ABAIXO:
        return view('pessoas.index',compact('pessoas'));

        // var_dump($usuarios);

    }
    public function listarComFiltros(Request $request)
    {
        var_dump($request->url());
        var_dump($request->query('nome'));
    }



}
