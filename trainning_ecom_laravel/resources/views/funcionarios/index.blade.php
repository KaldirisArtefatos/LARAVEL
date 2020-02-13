@extends('layout')
 
@section('header')
    <link rel="stylesheet" href="">    
@endsection
 
@section('cabecalho')
    Gestão de Funcionarios
@endsection
 
@section('conteudo')

@include('shared/mensagem')

<a href="{{ route('criar_funcionarios') }}" class="btn btn-success mb-2">Novo Funcionario</a>
 
<table class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">NomeMae</th>
        <th scope="col">NomePai</th>        
        <th scope="col">Comandos</th>  
      </tr>
    </thead>
    <tbody>
        @foreach($funcionarios as $fun)
            <tr>
                <th scope="row">{{$fun->id}}</th>
                
                <td>{{$fun->NomeMae}}</td>                
                <td>{{$fun->NomePai}}</td>                

                <td>
                    <form method="post" action="/funcionarios/{{ $fun->id }}">
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


