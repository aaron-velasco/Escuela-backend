<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use JWTAuth;

class ApiUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Comprueba si se puede registrar un nuevo usuario
     *
     * @return void
     */
    public function testCanSignup()
    {
        $response = $this->post('/api/auth/signup', [
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'test12',
            'password_confirmation' => 'test12',
        ]);
        
        $response->assertStatus(201);
    }

    /**
     * Comprueba si un usuario puede acceder con sus credenciales
     *
     * @return void
     */
    public function testCanSignIn()
    {
        $user = User::factory()->create();

        $response = $this->post('/api/auth/signin', [
            'email' => $user->email,
            'password' => 'password',
        ]);
        
        $response->assertStatus(200);
    }

    /**
     * Comprueba si un usuario puede cerrar sesión
     *
     * @return void
     */
    public function testCanSignOut()
    {
        $user = User::factory()->create();

        $token = JWTAuth::fromUser($user);

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $token
            ])->post('/api/auth/signout');

        $response->assertStatus(200);
    }

    /**
     * Comprueba si un usuario puede obtener su información de perfil
     *
     * @return void
     */
    public function testUserCanGetProfile()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/api/auth/user');
        
        $response->assertStatus(200);
    }
}
