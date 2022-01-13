@extends('layout')

@section('title',"Crear Usuario")
    
@section('content')
    <h1>Editar Usuario</h1>    
    @component('errors/shared._card')
        @slot('header','Editar Usuario')
        <div class="card">
            <h4 class="card-header">Editar Usuario</h4>
            <div class="card-body">
                @include('errors/shared._errors')
        <form method="POST" action="{{url("/users/{$user->id}")}}">
        {{method_field('PUT')}}
           @csrf
           @include('users._fields')           
           <br>
            <button type="submit" class="btn btn-primary">Actualizar usuarios</button>
            <a href="{{route('users.index')}}" class="btn btn-link">Regresar al listado de usuarios</a>        
        </form>   
    </div>
    </div>            
    @endcomponent
@endsection
