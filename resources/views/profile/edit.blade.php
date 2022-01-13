@extends('layout')

@section('title',"Crear Usuario")
    
@section('content')
    <h1>Editar Usuario</h1>    
    @component('errors/shared._card')
        @slot('header','Editar Usuario')
        <div class="card">
           
            <div class="card-body">
                @include('errors/shared._errors')
        <form method="POST" action="{{url("/editar-perfils/") }}">
        {{method_field('PUT')}}
           @csrf
           <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" class="form-control" name="name" placeholder="Anderson Dávila" value="{{old('name',$user->name)}}">           
        </div>
    
        <div class="form-group">         
            <label for="email">Correo Electronico:</label>
            <input type="email" class="form-control" name="email" placeholder="andersonypk@gmail.com" value="{{old('email',$user->email)}}">
          
        </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Mas de 6 carácteres">
        
          </div>
          <div class="form-group">
            <label for="bio">Bio:</label>
            <textarea name="bio" class="form-control" id="bio">{{old('bio',$user->profile->bio)}}</textarea>
        </div>
        <div>
          <div>
        <div class="form-group">
            <label for="profession_id">Profesión</label>
            <select name="profession_id" id="profession_id" class="form-control">
                            <option value="1">Debes escoger una profesion si deseas.</option>   
                @foreach ($professions as $profession)
                <option value="{{$profession->id}}"{{ old('profession_id',$user->profile->profession_id) == $profession->id ? ' selected':''}}>
                    {{$profession->tittle}}</option>   
               @endforeach 
                
            </select>
        </div>
            </div>
        </div>
        <div class="form-group">
            <label for="twitter">Twitter:</label>
            <input type="text" 
            class="form-control"
            name="twitter" 
            id="twitter" 
            placeholder="https://twitter.com/Anderson"
            value="{{old('twitter',$user->profile->twitter)}}">

        </div>
           <br>
            <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
            <a href="{{route('users.index')}}" class="btn btn-link">Regresar al listado de usuarios</a>        
        </form>   
    </div>
    </div>            
    @endcomponent
@endsection
