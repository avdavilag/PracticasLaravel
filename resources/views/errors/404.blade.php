@extends('layout')

@section('title', 'Pagina no encontrada')
    
@section('content')
    <h1>Panda te saluda</h1>
    <h1>Panda te saluda</h1>
    <h5>Pagina no encontrada</h5>
    <p>
        <a href="{{route('users.index')}}">Regresar al listado de usuarios</a>
    </p>
@endsection