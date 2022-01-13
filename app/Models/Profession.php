<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profession extends Model
{
    protected $table='professions';

    use HasFactory;
    protected $fillable=[
        'tittle',
        'selectable'
    ];
    public function profiles(){
        return $this->hasMany(UserProfile::class);
    }
}

