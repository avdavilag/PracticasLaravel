<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profession_id'
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
        return $this->is_admin;
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
        'is_admin' => 'boolean'
    ];

    public function profession(){//Profession id
        return $this->belongsTo(Profession::class);
    }
}
