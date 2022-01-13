@extends('layout')

@section('title',"Crear Profesiones")
    
@section('content')
    <h1>Crear Profesión</h1>       
    <div class="card">
        <h4 class="card-header">Crear Profesión</h4>
        <div class="card-body">
            @if($errors->any())
            <div class="alert alert-danger">
                <h4> Por favor corrije los errores debajo:</h4>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul> 
            </div>        
            @endif
        
            <form method="POST" action="{{url('/professions/crearbym')}}">
               @csrf
                <div class="form-group">
                <label for="tittle">Nombre:</label>
                <input type="text" class="form-control" name="tittle" placeholder="Ingeniero en Sistemas" value="{{old('tittle')}}">
               {{-- @if($errors->has('name'))
                    <p>{{$errors->first('name')}}</p>
               @endif --}}
            </div>
            <div class="form-group">
                <label for="selectable">Situación actual</label>
                <select name="selectable" id="selectable" class="form-control">
                    <option value="1">Activado</option>   
                    <option value="2">Desactivado</option>                                         
                </select>
            </div>              
              <p></p>
              <button type="submit" class="btn btn-primary">Crear Profesión</button>
                <a href="{{route('users.create')}}" class="btn btn-link">Regresar a la creación de Usuarios </a>
            </form>
        </div>
    </div>

   
@endsection
