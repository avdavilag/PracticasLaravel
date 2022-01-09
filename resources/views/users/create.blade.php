@extends('layout')

@section('title',"Crear Usuario")
    
@section('content')
    <h1>Crear Usuario</h1>       
    <div class="card">
        <h4 class="card-header">Crear Usuario</h4>
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
        
            <form method="POST" action="{{url('/users/crear')}}">
               @csrf
        
               <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" placeholder="Anderson Dávila" value="{{old('name')}}">
               {{-- @if($errors->has('name'))
                    <p>{{$errors->first('name')}}</p>
               @endif --}}
            </div>
        
            <div class="form-group">         
                <label for="email">Correo Electronico:</label>
                <input type="email" class="form-control" name="email" placeholder="andersonypk@gmail.com" value="{{old('email')}}">
                {{-- @if($errors->has('email'))
                <p>{{$errors->first('email')}}</p>
                @endif --}}
            </div>
              <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Mas de 6 carácteres">
                {{-- @if($errors->has('password'))
                <p>{{$errors->first('password')}}</p>
                @endif --}}
              </div>
              <div class="form-group">
                <label for="bio">Bio:</label>
                <textarea name="bio" class="form-control" id="bio">{{old('bio')}}</textarea>
               {{-- @if($errors->has('name'))
                    <p>{{$errors->first('name')}}</p>
               @endif --}}
            </div>
          
            <div class="form-group">
                <label for="profession_id">Profesión</label>
                <select name="profession_id" id="profession_id" class="form-control">
                
                    {{--///////Una forma de hacer correr el checkbox desde la base de datos 
                        @foreach (App\Models\Profession::all() as $profession)
                        //////// --}}
                        {{--//Otra forma de hacer imprimir el checbox de forma ordenada ascendente...
                    @foreach (App\Models\Profession::orderBy('tittle','ASC')->get() as $profession) --}}
                    <option value="1">Debes escoger una profesion si deseas.</option>   
                    @foreach ($professions as $profession)
                    <option value="{{$profession->id}}"{{ old('profession_id') == $profession->id ? ' selected':''}}>
                        {{$profession->tittle}}</option>   
                   @endforeach 
                    
                </select>
            </div>

            <div class="form-group">
                <label for="twitter">Twitter:</label>
                <input type="text" class="form-control" name="twitter" id="twitter" placeholder="https://twitter.com/Anderson" value="{{old('twitter')}}">
               {{-- @if($errors->has('name'))
                    <p>{{$errors->first('name')}}</p>
               @endif --}}
            </div>
                <p></p>
              <button type="submit" class="btn btn-primary">Crear usuarios</button>
                <a href="{{route('users.index')}}" class="btn btn-link">Regresar al listado de usuarios</a>
            </form>
        </div>
    </div>

   
@endsection
