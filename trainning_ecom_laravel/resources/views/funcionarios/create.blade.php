@extends('layout')
 
@section('cabecalho')
    Adicionar Funcionario
@endsection
 
@section('conteudo')
<form method="post">
    {{-- CROSS-SITE REQUEST FORGERY   Quem Pede é alguem de dentro do dominio.   Evita Injection --}}
    @csrf

    {{-- DEPOIS QUE COLOCOU AS FORENKEY NO BANCO COLOU ESSE CAMPOS PARA ENTRAR UM USUARIO JUNTO COM O FUNCIONARIO. --}}
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" name="name" id="name" required class="form-control">
    </div>
     <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required class="form-control">
    </div>
     <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" name="password" id="password" required min="1" class="form-control">
    </div>
 
 
 



    <div class="form-group">
        <label for="NomeMae" class="">Nome da Mãe</label>
        <input type="text" class="form-control" name="NomeMae" id="NomeMae">
        <label for="NomePai" class="">Nome do Pai</label>
        <input type="text" class="form-control" name="NomePai" id="NomePai">

        {{-- Combo que carrega os dados... Value = ID /  Mostra Nome --}}
        <div class="form-group">
            <label for="perfil_id">Perfil:</label>
            <select class="form-control" id="perfil_id" name="perfil_id">
                @foreach ($perfis as $perfil)
                    <option value="{{$perfil->id}}">{{$perfil->nome}}</option>
                @endforeach
            </select>
        </div>

    </div>
 
    <button class="btn btn-primary">Adicionar</button>
</form>

<hr>

@endsection
