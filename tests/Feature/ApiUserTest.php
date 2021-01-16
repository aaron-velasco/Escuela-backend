<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiUserTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
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
}
