<?php

namespace Database\Seeders;

use App\Models\Profession;
//use App\Models\User;
//use App\Models\User as Usuarios;//Otra forma de llamar para ejecutar los seeders.
use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
      //$professions=DB::select('SELECT id FROM professions WHERE tittle=? LIMIT 0,1',['Desarrollador Android']);
      //  dd($professions);
      $professionId=Profession::where(['tittle'=>'Desarrollador back-end'])->value('id');

       /*
        DB::table('users')->insert([
            'name'=>'Anderson Davila',
            'email'=>'andersonypk@g5mail.comfis',
            'password'=>bcrypt('laravel'),
            'profession_id'=>$professionId,
        ]);
        */            
      $user=\App\Models\User::factory()->create([
            // 'name'=>'Anderson Davila',
            // 'email'=>'suco19965@gmail.com',
            'password'=>bcrypt('laravel'),            
            'role'=> 'user',
        ]);

        $user->profile()->create([
            'bio'=>'Programador,profesor,editor,escritor,social media manager',
            'profession_id'=>2,
       
        ]);


        $user=\App\Models\User::factory()->create([
            // 'name'=>'Anderson Davila',
            // 'email'=>'',
            'password'=>bcrypt('laravel'),            
            'role'=> 'user',
        ]);

        $user->profile()->create([
            'bio'=>'Programador,profesor,editor,escritor,social media manager',
            'profession_id'=>3,
       
        ]);

        $user=\App\Models\User::factory()->create([
            // 'name'=>'Anderson Davila',
            // 'email'=>'',
            'password'=>bcrypt('laravel'),            
            'role'=> 'user',
        ]);

        $user->profile()->create([
            'bio'=>'Programador,profesor,editor,escritor,social media manager',
            'profession_id'=>4,
       
        ]);

        $user=\App\Models\User::factory()->create([
            // 'name'=>'Anderson Davila',
            // 'email'=>'',
            'password'=>bcrypt('laravel'),            
            'role'=> 'user',
        ]);

        $user->profile()->create([
            'bio'=>'Programador,profesor,editor,escritor,social media manager',
            'profession_id'=>5,
       
        ]);

        
        $user=\App\Models\User::factory()->create([
            // 'name'=>'Anderson Davila',
            // 'email'=>'',
            'password'=>bcrypt('laravel'),            
            'role'=> 'user',
        ]);

        $user->profile()->create([
            'bio'=>'Programador,profesor,editor,escritor,social media manager',
            'profession_id'=>6,
       
        ]);
       /// \App\Models\User::factory(User::class,29)->create()->each(function ($user){
        
        // \App\Models\User::factory(\App\Models\User::class,29)->create([
        //     'role'=>'user',
        // ]);
        
       // });           







        // Usuarios::create([
        //     'name'=>'Marlene Guerrro',
        //     'email'=>'mgmaria@gmail.com',
        //     'password'=>bcrypt('laravel'),
        //     'profession_id'=>1,
        // ]);

        // Usuarios::create([
        //     'name'=>'Marlene Guerrro Diaz',
        //     'email'=>'marlenegd@gmail.com',
        //     'password'=>bcrypt('laravel'),
        //     'profession_id'=>3,
        // ]);
    }
}
