<?php

namespace Database\Seeders;
use  App\Models\Profession as Profesion;
use Carbon\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProfessionSeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profesion::create([
                    'tittle' => 'Desarrollador de videojuegos',
            
                ]);
        \App\Models\Profession::factory()->times(17)->create([            
        ]);



        //DB::table('professions')->truncate();
        // DB::insert('INSERT INTO professions (tittle) VALUES (:tittle)',[
        //     'tittle'=>'Desarrollador IOS']); se pueda ingresar asi tambien.
        // DB::table('professions')->insert([
        //     'tittle' => 'Desarrollador back-end',

        // ]);
//   
//    Profesion::create([
//         'tittle' => 'Desarrollador De Woocommerce',

//     ]);
//   Profesion::create([
//         'tittle' => 'Desarrollador back-end',

//     ]);

    //DB::table('professions')->insert([
          //  'tittle' => 'Desarrollador back-end',
//
       // ]);
       // DB::table('professions')->insert([
       //     'tittle' => 'Desarrollador front-end',
//
      //  ]);
       // DB::table('professions')->insert([
          //  'tittle' => 'Desarrollador De Woocommerce',

      //  ]);
    }
}
