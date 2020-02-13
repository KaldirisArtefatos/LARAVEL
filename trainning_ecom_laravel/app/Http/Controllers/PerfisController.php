<?php

namespace App\Http\Controllers;

// Criar para poder stanciar as classes
use App\Perfil;

use Illuminate\Http\Request;

class PerfisController extends Controller
{
    public function index(){
        // Iniciamos fixado nesse array....>  $perfis = [ 'Administrador','Gerente','Vendedor']  --- trocou pelo abaixo.;
        // Eloquente = Entity  -  Vai buscar as informações
        // O Nome definido aqui como $perfis... deve ser o mesmo dentro do <compact class=""></compact>

        $perfis = Perfil::query()
                        ->orderBy('id')
                        ->get();   
      

        return view('perfis.index',compact('perfis'));
    }

    public function create(){
        return view('perfis.create');
    }

    public function store(Request $request)
    {
        // Perfil Herda de Model...
        $perfil = new Perfil();           // Actived Record Pattern  ---   Colocar o Use no TOPO... use App\Perfil;
        $perfil->nome = $request->nome;   // Equivale a  $_POST["nome"]
        $perfil->save();
        
        // echo "Perfil Criado";
        // Session some depois de consumida
        // $request->session()->flash(
        //     'mensagem',
        //     "Perfil ID: {$perfil->id} criado com sucesso Nome : {$perfil->nome}"
        // );
        
        // Passou uma Vetro de Parametros...
        $params = ["Cabeçalho","Mensagem","D"];
        $request->session()->flash(
            'params',
            $params
        );
        

        
        
        return redirect()->route('listar_perfis');

    }

    public function destroy(Request $request)
    {
        Perfil::destroy($request->id);

        return redirect()->route('listar_perfis');

    }


    
}
