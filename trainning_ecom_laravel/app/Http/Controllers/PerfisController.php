<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfisController extends Controller
{
    public function index(){
        $perfis = [ 'Administrador','Gerente','Vendedor'];
        return view('perfis.index',compact('perfis'));
    }

    public function create(){
        return view('perfis.create');
    }

    public function store(Request $request)
    {
        //TODO:  Implementar
    }

}
