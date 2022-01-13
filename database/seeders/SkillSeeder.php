<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $skill=\App\Models\Skill::factory()->create([
             'name'=>'HTML',                         
        ]);

        $skill=\App\Models\Skill::factory()->create([                   
            'name'=>'CSS',                               
       ]);
       $skill=\App\Models\Skill::factory()->create([
        'name'=>'JS',                           
   ]);
   $skill=\App\Models\Skill::factory()->create([
    'name'=>'PHP',                      
]);
$skill=\App\Models\Skill::factory()->create([
    'name'=>'SQL',            
]);
$skill=\App\Models\Skill::factory()->create([           
    'name'=>'OOP',            
]);
$skill=\App\Models\Skill::factory()->create([        
    'name'=>'TDD',            
]);
  }
}
