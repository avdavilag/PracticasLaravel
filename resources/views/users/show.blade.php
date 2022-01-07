@extends('layout')

@section('title',"Usuario{$user->id}")
    
@section('content')
    <h1>Hola</h1>
    <div class="card">
        <h4 class="card-header">Información del Usuario: {{$user->name}}</h4>
        <div class="card-body">
        <div class="form-group">
     <h6 for="name">Nombre del Usuario:</h6>
    <p class="form-control">{{$user->name}}</p>
        </div>
        <div class="form-group">
    <h6 for="name">Correo Electronico:</h6>
    <p class="form-control">Correo Electronico: {{$user->email}}</p>
    </div>
    <p>
        <a href="{{route('users.index')}}" class="btn btn-primary">Regresar al listado de usuarios</a>
    </p>
        </div>
    </div>
    
@endsection
