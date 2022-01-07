<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class UserModuleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return @test
     */
    public function test_example()
    {
        // $this->get('/usuarios')
        // ->assertStatus(200)
        // ->assertSee('Usuarios');
        $this->withoutExceptionHandling();
        
        $this->post('/usuarios/',[
            'name'=>'Anderson',
            'email'=>'anderson1995@gmail.com',
            'password'=>'123456'
        ])->assertRedirect(route('users.index'));

        $this->assertDatabaseHas('users',[
            'name'=>'Anderson',
            'email'=>'anderson1995@gmail.com'
        ]);

    }
  /**
     * A basic feature test2 example.
     *
     * @return @test
     */
   public function it_shows_the_users_list()
    {
        \App\Models\User::factory()->create([
                        'name'=>'Usuario1',
                        'profession_id'=> 1,
                       ]);
               
                       \App\Models\User::factory()->create([
                           'name'=>'Usuario2',
                           'profession_id'=> 1,
                          ]);
               
                    $this->get('/users')
                    ->assertStatus(200)
                    ->assertSee('Usuario1')
                    ->assertSee('Usuario2'); 
    }
     /**
     * A basic feature test example.
     *
     * @return @test
     */
    public function it_shows_a_default_message_if_the_users_list_is_empty()
    {
        DB::table('users')->truncate();
   
        $this->get('/users'
        )
        ->assertStatus(200)
        ->assertSee('No hay usuarios registrados');
                       
    }

    /**
     * A basic feature test example.
     *
     * @return @test
     */
    public function it_creates_a_new_user()
    {
        $this->withoutExceptionHandling();
        
        $this->post('/users/',[
            'name'=>'Anderson',
            'email'=>'anderson1995@gmail.com',
            'password'=>'123456'
        ])->assertRedirect('users');

        $this->assertDatabaseHas('users',[
            'name'=>'Anderson',
            'email'=>'anderson1995@gmail.com'
        ]);
    }


}
