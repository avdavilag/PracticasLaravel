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