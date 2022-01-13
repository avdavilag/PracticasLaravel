<?php

namespace App\Http\Requests;

use App\Models\role;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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

            'name' => 'required',
            'email' => [
                'required', 'email',
                Rule::unique('users')->ignore($this->user)
            ],
            'password' => '',
            'role' => [Rule::in(Role::getList())],
            'bio' => 'required',
            'twitter' => ['nullable', 'present', 'url'],
            'profession_id' => [
                'nullable', 'present',
                Rule::exists('professions', 'id')->where('selectable', true)
            ],
            'skills' => [
                'array',
                Rule::exists('skills', 'id'),
            ],
        ];
      
    }

    public function update(User $user){
        $user->fill([
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ]);

        if ($this->password != null) {
            $user->password = bcrypt($this->password);
        }

        $user->save();

        $user->profile->update([
            'twitter' => $this->twitter,
            'bio' => $this->bio,
            'profession_id' => $this->profession_id,
        ]);

        $user->skills()->sync($this->skills ?: []);
    }
        
//         $data=$this->validated();

//         if($data['password']!=null){
//             $data['password']=bcrypt($data['password']);       
//         }else{
//             unset($data['password']);
//         }
//         $user->fill($data);
//         $user->update($data);
//         $user->role=$data['role'];
//         $user->save();
//         $user->profile->update($data);

 
// //            $user->skills()->detach(); Una forma de editar
//           //  $user->skills()->attach($data['skills']); las 2 formas
//           $user->skills()->sync($data['skills'] ?? [] );
    }

