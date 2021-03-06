<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    use SoftDeletes;
    protected $table='users';
    protected $guarded=[];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function findByEmail($email){
        return static::where(compact('email'))->first();
    }
    public function isAdmin(){
        return $this->role==='admin';
        //return $this->email==='suco19965@gmail.com';-> Pilas se queremos que solo un email pueda hacer administrador...
    }

   

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $castss= [
        //'is_admin' => 'boolean'
    ];
////Creacion de Usuario con Profile, mediante el Model..
    // public static function createUser($data){
    //     DB::transaction(function() use ($data){
    //         $user=User::create([
    //             'name' => $data['name'],
    //             'email'=>$data['email'],
    //             'password'=>$data['password'],
    //             'profession_id'=>$data['profession_id']
    //            ]);
    //            $user->profile()->create([
    //             'bio'=> $data['bio'],
    //             'twitter'=>$data['twitter'],        
    //            ]);
    //        });         
    // }    
/////////////////////////////////////////////////////    
 
    public function profile(){
        return $this->hasOne(UserProfile::class)->withDefault([
            'bio'=>'Recuerda no tienes una bio escrita'
        ]);
    }
    public function skills()
    {
        return $this->belongsToMany(Skill::class,'user_skill');
    }
}
