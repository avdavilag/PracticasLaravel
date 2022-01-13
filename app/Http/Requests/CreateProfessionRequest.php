<?php

namespace App\Http\Requests;

use App\Models\Profession;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;

class CreateProfessionRequest extends FormRequest
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
            'tittle'=> ['required','unique:professions,tittle'],
            'selectable'=>'',
        ];
    }
    public function messages()
    {
        return [
            'tittle.required' => 'El Campo nombre es obligatorio',
            'email.unique'=> 'Mil disculpas el titulo ya se encuentra registrado',
        ];
    }
    public function CreateProfession(){
    
        DB::transaction(function(){
            $data = $this->validated();
            $profession=Profession::create
                ([
                'tittle' => $data['tittle'],
                'selectable'=>$data['selectable'],                
               ]);
             
           }); 
     
     
    }
}
