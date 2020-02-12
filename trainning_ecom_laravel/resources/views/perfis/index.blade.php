@extends('layout')
 
@section('header')
    <link rel="stylesheet" href="">    
@endsection
 
@section('cabecalho')
    Gestão de Perfis    
@endsection
 
@section('conteudo')
<ul class="list-group">
    @foreach($perfis as $perfil)
        <li class="list-group-item">{{$perfil}}</li>
    @endforeach
</ul>
@endsection
