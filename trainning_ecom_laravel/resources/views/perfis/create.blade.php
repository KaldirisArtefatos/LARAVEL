@extends('layout')
 
@section('cabecalho')
    Adicionar Perfil
@endsection
 
@section('conteudo')
<form method="post">
    {{-- CROSS-SITE REQUEST FORGERY   Quem Pede é alguem de dentro do dominio.   Evita Injection --}}
    @csrf
    <div class="form-group">
        <label for="nome" class="">Nome</label>
        <input type="text" class="form-control" name="nome" id="nome">
    </div>
 
    <button class="btn btn-primary">Adicionar</button>
</form>
<hr>

{{-- YouTube --}}
<div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/vlDzYIIOYmM" allowfullscreen></iframe>
</div>
{{-- VIMEO --}}
<div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://player.vimeo.com/video/137857207" allowfullscreen></iframe>
</div>

{{-- Google map --}}
<div id="map-container" class="z-depth-1-half map-container" style="whith:800px height: 500px">
    <iframe src="https://maps.google.com/maps?q=manhatan&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0"
      style="border:1" allowfullscreen></iframe>
</div>

@endsection
