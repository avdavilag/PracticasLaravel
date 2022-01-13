<?php

namespace App\Http\Controllers;

use App\Models\Profession;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function edit(){
        $user=User::first();
         return view('profile.edit',
         [
            'user' => $user,
            'professions' => Profession::OrderBy('tittle')->get(),
         ]);
    }
    public function update(Request $request)
    {
        $user = User::first(); //or auth()->user()

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $user->profile->update([
            'bio' => $request->bio,
            'twitter' => $request->twitter,
            'profession_id' => $request->profession_id,
        ]);

        return back();
    }


}
