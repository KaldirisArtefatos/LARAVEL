<?php

namespace App\Http\Controllers;

use App\Funcionarios;
use Illuminate\Http\Request;

class FuncionariosController extends Controller
{

    public function index(){
        $funcionarios = Funcionarios::query()
                        ->orderBy('id')
                        ->get();   

        return view('funcionarios.index',compact('funcionarios'));
    }

    public function create(){
        return view('funcionarios.create');
    }

    public function store(Request $request){
        $funcionario = New Funcionarios();
        $funcionario->NomeMae = $request->NomeMae;
        $funcionario->NomePai = $request->NomePai;
        $funcionario->save();

        request()->session()->flash(
            "mensagem",
            "Funcionario Criado  {$funcionario->id}"
        );

        return redirect()->route('listar_funcionarios');


    }
    public function destroy(Request $request){
        Funcionarios::destroy($request->id);
         request()->session()
        ->flash(
            "mensagem",
            "Funcionario {$request->id} excluído com sucesso."
        );
 
        return redirect()->route('listar_funcionarios');
    }


}
