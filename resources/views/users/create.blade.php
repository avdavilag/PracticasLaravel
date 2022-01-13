@extends('layout')

@section('title',"Crear Usuario")
    
@section('content')
    <h1>Crear Usuario;</h1>;       
 @component('errors/shared._card')
    
     @slot('header','Nuevo Usuario'){{--77 --}}
  
    @include('errors/shared._errors')
        
    <form method="POST" action="{{url('/users/crear')}}">
       @csrf
       @include('users._fields');
        <p></p>
      <button type="submit" class="btn btn-primary">Crear usuarios</button>
        <a href="{{route('users.index')}}" class="btn btn-link">Regresar al listado de usuarios</a>
    </form>         
 @endcomponent     
@endsection
