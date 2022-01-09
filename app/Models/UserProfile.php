<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $table='user_profiles';
    protected $fillable=[
    'bio',
    'twitter',
    'profession_id'    
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function profession(){//Profession id
        return $this->belongsTo(Profession::class);
    }
}
