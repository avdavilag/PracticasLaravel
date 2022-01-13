<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\{Profession, Skill, User,UserProfile};
use Dflydev\DotAccessData\Data;
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
       
        $users=User::orderByDesc('created_at')->paginate(4);
       // dd($users);
        $title = 'Listado de usuarios';

        // return view('users.index') Forma de llamar a la vista..
        // ->with('users', User::all())
        // ->with('tittle','Listado de usuarios');

        return view('users.index', compact('title', 'users'));
    }
public function trashed(){

    $users=User::onlyTrashed()->get();///Usuarios que se encuentra en papelera...
    
     $title = 'Listado de usuarios en papelera';
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
        $professions=Profession::orderBy('tittle','ASC')->get();
        $skills=Skill::orderBy('name','ASC')->get();
        $roles=trans(('users.roles'));
        $user=new User;
        
        return view('users.create',compact('professions','skills','roles','user'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // $variable=0;
        // dd($variable);
        $request->CreateUser();
      
        return redirect()->route('users.index');
       
        // if(empty($data['name'])){
        //     return redirect('users/nuevo')->withErrors([
        //        'name' => 'El campo nombre es obligatorio'
        //     ])
        //     ;

        // }

        // dd($data);
       //
    //    return redirect('usuarios/users')->withInput();
    //    $data=request()->validate([
    //        'name'=> 'required',
    //        'email'=>['required','email','unique:users,email'],
    //        'password'=>'required|min:5|max:10',
    //        'profession_id'=>'',
    //        'bio'=>'required',
    //        'twitter'=>'url'
    //    ],[
    //       'name.required' => 'El Campo nombre es obligatorio',
    //       'email.required' => 'Por favor ingresa un dirección valida',
    //       'email.unique'=> 'Mil disculpas esta direccion de correo electronico ya esta registrada busca otra',
    //       'password.required '=>'Recuerda la advertencia de contraseñas por favor'
    //    ]);
       //Creacion de Usuario desde el controlador de laravel
    //    DB::transaction(function() use ($data){
    //     $user=User::create([
    //         'name' => $data['name'],
    //         'email'=>$data['email'],
    //         'password'=>$data['password'],
    //         'profession_id'=>$data['profession_id']
    //        ]);
    //        $user->profile()->create([
    //         'bio'=> $data['bio'],
    //         'twitter'=>$data['twitter'],        
    //        ]);
    //    });
      // User::createUser($data);
        //////////
        ///Creacion de Usuario mediante controlador...
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $messague2="";
        $Nprofession=$user->profile->profession_id;
        
        $professionname = DB::table('professions')->where('id', $Nprofession)->value('tittle');
    //    dd($professionname);

       // dd($user->profile->twitter);
        if($user->profile->twitter==null){
        $messague2="El usuario no tiene twitter";
        return view('users.show', compact('user','messague2','professionname'));    
        }else{
            $messague2="";
            return view('users.show', compact('user','messague2','professionname'));
        }
        //
        // $user=User::findOrFail($user);///laravel transforma en una respuesta 404..
        //exit('Linea no encontrada');
        // if($user == null){
        //     return response()->view('errors.404',[],404);
        // }
       // $user= User::find($id);
        
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
        $professions=Profession::orderBy('tittle','ASC')->get();
        $skills=Skill::orderBy('name','ASC')->get();
        $roles=trans(('users.roles'));
        return view('users.edit',compact('professions','skills','roles','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        // dd($request);
       $request->update($user);
        
        return redirect()->route('users.show',['user'=>$user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function trash(User $user)
    {
        $user->delete();
        $user->profile()->delete();       
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        //
        $user=User::onlyTrashed()->where('id',$id)->firstOrFail();
        // abort_unless($user->trashed(),400);//Al menos si se aya 
        //eliminado evitamos utilizar el forzar a eliminar... 
        $user->forcedelete();//Fuerza a eliminar 
        return redirect()->route('users.trashed');
    }

   
}
