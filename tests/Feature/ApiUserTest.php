<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

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
        $this->seed();
        $response = $this->post('/api/auth/signin', [
            'email' => 'test@test.com',
            'password' => 'test12',
        ]);
        
        $response->assertStatus(200);
    }
}
