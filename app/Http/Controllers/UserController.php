<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule as ValidationRule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        $users=User::all();
       // dd($users);
        $title = 'Listado de usuarios';

        // return view('users.index') Forma de llamar a la vista..
        // ->with('users', User::all())
        // ->with('tittle','Listado de usuarios');

        return view('users.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // if(empty($data['name'])){
        //     return redirect('users/nuevo')->withErrors([
        //        'name' => 'El campo nombre es obligatorio'
        //     ])
        //     ;

        // }

        // dd($data);
       //
    //    return redirect('usuarios/users')->withInput();
       $data=request()->validate([
           'name'=> 'required',
           'email'=>['required','email','unique:users,email'],
           'password'=>'required|min:5|max:10',
           'profession_id'=>''
       ],[
          'name.required' => 'El Campo nombre es obligatorio',
          'email.required' => 'Por favor ingresa un dirección valida',
          'email.unique'=> 'Mil disculpas esta direccion de correo electronico ya esta registrada busca otra',
          'password.required '=>'Recuerda la advertencia de contraseñas por favor'
       ]);

       User::create([
        'name' => $data['name'],
        'email'=>$data['email'],
        'password'=>$data['password'],
        'profession_id'=>$data['profession_id']
       ]);
        return redirect()->route('users.index');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        
        //
        // $user=User::findOrFail($user);///laravel transforma en una respuesta 404..
        //exit('Linea no encontrada');
        // if($user == null){
        //     return response()->view('errors.404',[],404);
        // }
       // $user= User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
        return view('users.edit',['user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(User $user)
    {
        $data=request()->validate([
            'name'=> 'required',
            'email'=>[
            'required',
            'email',
             ValidationRule::unique('users')->ignore($user->id)],
            'password'=>'required|min:5|max:10',
            'profession_id'=>''

        ],[
            'name.required' => 'El campo nombre no puede estar en blanco',
            'email.required' => 'Por favor ingresa un dirección valida',
            'email.unique'=> 'Mil disculpas esta direccion de correo electronico ya esta registrada busca otra',
            'password.required '=>'Recuerda la advertencia de contraseñas por favor'
         ]);
     
        if($data['password']!=null){
            $data['password']=bcrypt($data['password']);       
        }else{
            unset($data['password']);
        }
        $user->update($data);


        return redirect()->route('users.show',['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return redirect()->route('users.index');
    }
}
