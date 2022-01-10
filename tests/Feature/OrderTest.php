<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testOrderCreatedCorrectly()
    {
        $user = factory(Order::class)->create();
        // $token = $user->generateToken();
        // $headers = ['Authorization' => "Bearer $token"];
        $headers = [];

        $payload = [
            'description' => 'MacBook Pro',
            'quantity' => 6,
            'tracking_code' => '897654563',
            'contact_number' => '0827502530',
            'address' => 'address where to deliver'
        ];

        $this->json('POST', '/api/orders', $payload, $headers)
            ->assertStatus(200)
            ->assertJson([
                'id' => 1, 
                'description' => 'MacBook Pro', 
                'quantity' => 6,
                'tracking_code' => '897654563',
                'contact_number' => '0827502530',
                'address' => 'address where to deliver'
            ]);
    }
}
