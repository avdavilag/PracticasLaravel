<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserProfile extends Model
{
    protected $guarded=[];
    use SoftDeletes;
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
