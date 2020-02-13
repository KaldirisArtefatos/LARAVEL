@extends('layout')
 
@section('cabecalho')
    Adicionar Funcionario
@endsection
 
@section('conteudo')
<form method="post">
    {{-- CROSS-SITE REQUEST FORGERY   Quem Pede é alguem de dentro do dominio.   Evita Injection --}}
    @csrf
    <div class="form-group">
        <label for="NomeMae" class="">Nome da Mãe</label>
        <input type="text" class="form-control" name="NomeMae" id="NomeMae">
        <label for="NomePai" class="">Nome do Pai</label>
        <input type="text" class="form-control" name="NomePai" id="NomePai">
    </div>
 
    <button class="btn btn-primary">Adicionar</button>
</form>

<hr>

@endsection
