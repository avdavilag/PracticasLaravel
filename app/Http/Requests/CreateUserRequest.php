<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'email'=>['required','email','unique:users,email'],
            'password'=>'required|min:5|max:10',
            'profession_id' => ['nullable','present',
            Rule::exists('professions', 'id')->where('selectable', true)],//Escojer la segunda importacion de Rule....        
            'bio'=>'required',
            'twitter'=>['nullable','present','url'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'El Campo nombre es obligatorio',
            'email.required' => 'Por favor ingresa un dirección valida',
            'email.unique'=> 'Mil disculpas esta direccion de correo electronico ya esta registrada busca otra',
            'password.required '=>'Recuerda la advertencia de contraseñas por favor'
        ];
    }
    public function CreateUser(){
    
        DB::transaction(function(){
            $data = $this->validated();
            $user=User::create
                ([
                'name' => $data['name'],
                'email'=>$data['email'],
                'password'=>bcrypt($data['password']),
                
               ]);
               $user->profile()->create([
                'bio'=> $data['bio'],
                'twitter'=>$data['twitter'],// ?? null, //?? permite operador para que pase las pruebas..       
                'profession_id'=>$data['profession_id'],
               ]);
           }); 
                   /////////////////////////////
        //Instancia que se llama desde el modelo Users
        // User::createUser($this->validated());
        /////////////////////////////  
    }
}
