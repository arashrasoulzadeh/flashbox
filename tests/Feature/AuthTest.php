<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_register()
    {
        $response = $this->post('/api/auth/register', [
            'name' => Str::random(8),
            'email' => 'seller@gmail.com',
            'password' => Hash::make('12345678')
        ]);

        $response->assertStatus(200);
    }

    public function test_login()
    {
        $response = $this->post('/api/auth/login', [
            'email' => 'admin@admin.com',
            'password' => '12345678'
        ]);

        $response->assertStatus(200);
    }
}
