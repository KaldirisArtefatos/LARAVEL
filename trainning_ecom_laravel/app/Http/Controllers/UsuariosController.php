<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function listar(){
        $usuarios = ["José", "Maria", "João"];
        // return view('usuarios.index',['usuarios'=>$usuarios]);
        // OU DA FORMA ABAIXO:
        return view('usuarios.index',compact('usuarios'));

        // var_dump($usuarios);

    }
    public function listarComFiltros(Request $request)
    {
        var_dump($request->url());
        var_dump($request->query('nome'));
    }

}
