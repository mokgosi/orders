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
        // $user = factory(User::class)->create();
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

    public function testOrdersListedCorrectly()
    {
        factory(Article::class)->create([
            'description' => 'MacBook Pro 1', 
            'quantity' => 6,
            'tracking_code' => '897654563',
            'contact_number' => '0827502530',
            'address' => 'address where to deliver'
        ]);

        factory(Article::class)->create([
            'description' => 'MacBook Pro 2', 
            'quantity' => 6,
            'tracking_code' => '897654564',
            'contact_number' => '0827502530',
            'address' => 'address where to deliver'
        ]);

        // $user = factory(User::class)->create();
        // $token = $user->generateToken();
        // $headers = ['Authorization' => "Bearer $token"];
        $headers = [];

        $response = $this->json('GET', '/api/orders', [], $headers)
            ->assertStatus(200)
            ->assertJson([
                [
                    'description' => 'MacBook Pro 2', 
                    'quantity' => 6,
                    'tracking_code' => '897654564',
                    'contact_number' => '0827502530',
                    'address' => 'address where to deliver'
                ], [ 
                    'description' => 'MacBook Pro 1', 
                    'quantity' => 6,
                    'tracking_code' => '897654563',
                    'contact_number' => '0827502530',
                    'address' => 'address where to deliver'
                ]
            ])
            ->assertJsonStructure([
                '*' => [
                    'id', 
                    'description', 
                    'quantity', 
                    'tracking_code',
                    'contact_number',
                    'address',
                    'created_at', 
                    'updated_at'
                ],
            ]);
    }
}
