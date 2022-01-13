@csrf
               <div class="form-group">
                <label for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" placeholder="Anderson Dávila" value="{{old('name',$user->name)}}">
               {{-- @if($errors->has('name'))
                    <p>{{$errors->first('name')}}</p>
               @endif --}}
            </div>
        
            <div class="form-group">         
                <label for="email">Correo Electronico:</label>
                <input type="email" class="form-control" name="email" placeholder="andersonypk@gmail.com" value="{{old('email',$user->email)}}">
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
                <textarea name="bio" class="form-control" id="bio">{{old('bio',$user->profile->bio)}}</textarea>
               {{-- @if($errors->has('name'))
                    <p>{{$errors->first('name')}}</p>
               @endif --}}
            </div>
            <div>
              <div>
            <div class="form-group">
                <label for="profession_id">Profesión</label><a href="{{route('profession.create')}}" class="btn btn-link">Nuevo Profesión</a>
                <select name="profession_id" id="profession_id" class="form-control">
                
                    {{--///////Una forma de hacer correr el checkbox desde la base de datos 
                        @foreach (App\Models\Profession::all() as $profession)
                        //////// --}}
                        {{--//Otra forma de hacer imprimir el checbox de forma ordenada ascendente...
                    @foreach (App\Models\Profession::orderBy('tittle','ASC')->get() as $profession) --}}
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
               {{-- @if($errors->has('name'))
                    <p>{{$errors->first('name')}}</p>
               @endif --}}
            </div>
            <label for="Skills">Habilidades:</label>
            <p></p>
            @foreach ($skills as $skill)
                <div class="form-check form-check-inline">
                <input name="skills[{{$skill->id}}]" 
                class="form-check-input" 
                type="checkbox"
                id="skill_{{$skill->id}}" 
                value="{{$skill->id}}"
                {{-- {{ in_array($skill->id, array_wrap(old('skills'))) ? 'checked' : '' }}> --}}
                {{ $errors->any() ? old("skills.{$skill->id}") : $user->skills->contains($skill) ? 'checked' : '' }}>              
                <label class="form-check-label" for="skill_{{$skill->id}}">{{$skill->name}}</label>
              </div>              
              @endforeach
                <div class="form-group">
                <label for="rol">Rol:</label>
                <p></p>
                @foreach ($roles as $role => $name)                                    
              <div class="form-check form-check-inline">
                <input class="form-check-input"
                type="radio"
                name="role"
                id="role_{{$role}}"
                value="{{$role}}"
                {{old('role',$user->role) == $role ? 'checked':''}}>
                <label class="form-check-label" for="role_{{$role}}">{{$name}}</label>
            </div>
            @endforeach
        </div>