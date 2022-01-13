@extends('layout')

@section('title',"Usuario{$user->id}")
    
@section('content')
    <h1>Hola</h1>
    <div class="card">
        <h4 class="card-header">Información del Usuario: {{$user->name}}</h4>
        <h6>
        <a href="{{route('users.index')}}" class="btn btn-link"><span class="oi" data-glyph="action-undo"></span></a>
        <a href="{{ route('users.edit', [$user]) }}" class="btn btn-link"><span class="oi" data-glyph="pencil"></span></a>
      
        <div class="card-body">
        <div class="form-group">
     <h6 for="name">Nombre del Usuario:</h6>
    <p class="form-control">{{$user->name}}</p>
        </div>
        <div class="form-group">
    <h6 for="email">Correo Electronico:</h6>
    <p class="form-control">{{$user->email}}</p>
    </div>
    
    <div class="form-group">
        <h6 for="profesion">Profesión:</h6>
    
        <p class="form-control">{{$professionname}}</p>     
        </div>

    <div class="form-group">
    <h6 for="bio">Bibliografia:</h6>
    <textarea readonly="readonly" class="form-control" class="form-control">{{$user->profile->bio}}</textarea>   
    </div>
    
    <div class="form-group">
        <h6 for="twitter">Twitter:</h6>
    
        <p class="form-control">{{$user->profile->twitter}},{{$messague2}}</p>     
        </div>

        
        </div>
    </div>
@endsection
