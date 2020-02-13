{{-- TROCOU PELA TABLE --}}
{{-- <ul class="list-group"> --}}
    {{-- @foreach($perfis as $perfil) --}}
        {{-- <li class="list-group-item">{{$perfil}}</li> --}}
        {{-- TROCOU POR ESSA QUANDO PASSOU A SER PUXADO DO BANCO --}}
        {{-- <li class="list-group-item">{{$perfil->nome}}</li> --}}   
    {{-- @endforeach --}}
{{-- </ul> --}}


@extends('layout')
 
@section('header')
    <link rel="stylesheet" href="">    
@endsection
 
@section('cabecalho')
    Gestão de Perfis    
@endsection
 
@section('conteudo')


{{-- @if(session()->has('mensagem'))
    <div class="alert alert-success">
        {{ session()->get('mensagem')}}
    </div>
@endif --}}

@if(session()->has('params'))
    <div class="alert alert-success">
        <?php
            $params = session()->get('params');
            var_dump($params);
        ?>        
        
    </div>
@endif





<a href="{{ route('criar_perfil') }}" class="btn btn-success mb-2">Adicionar</a>
 
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Ações</th>        
      </tr>
    </thead>
    <tbody>
        @foreach($perfis as $perfil)
            <tr>
                <th scope="row">{{$perfil->id}}</th>
                <td>{{$perfil->nome}}</td>                
                <td>
                    <form method="post" action="/perfis/{{ $perfil->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="far fa-trash-alt"></i>
                        </button>
                    </form>
                <td>
            </tr>    
        @endforeach
    </tbody>
  </table>
 
@endsection

