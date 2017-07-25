@extends('layouts.principal')

@section('content')
<p>
<h1>Atribuir Bolsa a  {{$r->name}}</h1>

<form action="#/{{$r->id}}" method="post">

  <button type="submit" class="btn btn-primary btn-block">Registrar</button>
</form>
  <br>
<a href="/lusuarios "> <button class="btn btn-primary btn-block">Cancelar</button> </a>

@stop
