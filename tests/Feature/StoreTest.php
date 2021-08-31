<?php

namespace Tests\Feature;

use Tests\TestCase;

class StoreTest extends TestCase
{
    public function test_create_store()
    {
        $token = auth()->attempt([
            "email" => 'admin@admin.com',
            "password" => '12345678'
        ]);
        $headers = ["authorization" => "bearer " . $token];
        $response = $this->post('/api/admin/seller/create', [
            'owner_id' => 2,
            'name' => 'sample',
            'lat' => 35.69439,
            'long' => 51.42151,
            'service_radius' => 100,
            'address' => 'Tehran'
        ], $headers);

        $response->assertStatus(200);

    }

    public function test_load_stores()
    {
        $token = auth()->attempt([
            "email" => 'seller@gmail.com',
            "password" => '12345678'
        ]);
        $headers = ["authorization" => "bearer " . $token];
        $response = $this->get('/api/seller/stores/list');
        $response->assertJsonCount(1, 'data.data');
    }

    public function test_load_single_store()
    {
        $token = auth()->attempt([
            "email" => 'seller@gmail.com',
            "password" => '12345678'
        ]);
        $headers = ["authorization" => "bearer " . $token];
        $response = $this->get('/api/seller/stores/1');
        $response->assertSimilarJson(["data" => ["store" => ["id" => 1]]]);
    }

}
