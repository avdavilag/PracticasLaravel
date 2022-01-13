@extends('layout')
@section('title')
   
@endsection
@section('content') 
<h1>hola 1</h1>
<div class="d-flex justify-content-between align-items-end mb-2">
    <h1 class="pb-1">Listado de Profesiones</h1>
    {{-- <p> 
    <a href="{{route('users.create')}}" class="btn btn-primary">Nuevo Usuario</a>
    </p> --}}
</div>
 {{-- @if ($users->isNotEmpty())    --}}
<table class="table table-dark table-striped">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Titulo</th>
          <th scope="col">Perfiles</th>          
          <th scope="col">Acciones</th>          
        </tr>
      </thead>
      <tbody>
        @forelse ($professions as $profession)
        <tr>
          <th scope="row">{{$profession->id}}</th>                       
          <td>{{$profession->tittle}}</td> 
          <td>{{$profession->profiles_count}}</td>  
  
          <td>
              @if($profession->profiles_count==0)
              <form action="{{url("professions/{$profession->id}")}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-link"><span class="oi" data-glyph="trash"></span></button>
            </form>
            @endif

          </td>
        </tr>
      </tbody>
      @endforeach
  </table>
  {{-- @else
    <p>No hay Usuarios Registrados</p> 
  @endif --}}
@endsection



