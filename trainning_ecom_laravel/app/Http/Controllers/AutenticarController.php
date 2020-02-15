<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticarController extends Controller
{
    public function index()
    {
        return view('autenticar.index');
    }


    public function entrar(Request $request)
    {
        //$autenticou = Auth::attempt($request->only(['email', 'password'])); // forma 1

        $autenticou = Auth::attempt(['email' => $request->email, 'password' => $request->password]); // forma 2

        if (!$autenticou) {
            return redirect()
                ->back() // Volta para
                ->withErrors('Usuário e/ou senha incorretos'); //devolve um array de erros
        }

        // antenticou com sucesso
        return redirect()->route('listar_funcionarios');
    }
}
