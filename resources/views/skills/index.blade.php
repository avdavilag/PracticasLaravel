@extends('layout')
@section('title')
    
@endsection

@section('content') 
<h1>hola 1</h1>
<div class="d-flex justify-content-between align-items-end mb-2">
    <h1 class="pb-1">Listado de Habilidades</h1>
    {{-- <p> 
    <a href="{{route('users.create')}}" class="btn btn-primary">Nuevo Usuario</a>
    </p> --}}
</div>


 {{-- @if ($users->isNotEmpty())    --}}
<table class="table table-dark table-striped">
    <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>          
          <th scope="col">Acciones</th>          
        </tr>
      </thead>
      <tbody>
        @forelse ($skills as $skill)
        <tr>
          <th scope="row">{{$skill->id}}</th>
          <td>{{$skill->name}}</td>   
          <td>
              {{-- <form action="{{route('users.delete',$user)}}" method="POST">
                @csrf
                {{method_field('DELETE')}}
                <a href="{{ route('users.show', [$user]) }}" class="btn btn-link"><span class="oi" data-glyph="eye"></span></a>
                <a href="{{ route('users.edit', [$user]) }}" class="btn btn-link"><span class="oi" data-glyph="pencil"></span></a>
                <button type="submit" class="btn btn-link"><span class="oi" data-glyph="trash"></span></button>
            </form> --}}

          </td>
        </tr>
      </tbody>
      @endforeach
  </table>
  {{-- @else
    <p>No hay Usuarios Registrados</p> 
  @endif --}} 
@endsection
