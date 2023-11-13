<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CustomerProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testFetchCustomerProducts()
    {
        // Arrange
        Customer::factory()
            ->count(5)
            ->create()
            ->each(function ($customer) {
                // Attach a random number of products to each customer
                $customer->products()->attach(Product::inRandomOrder()->take(rand(1, 5))->get());
            });

        // Act
        $response = $this->get('/fetch-customer-products');

        // Assert
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data',
            'links',
            'meta',
        ]);
        $response->assertJsonCount(5, 'data');
    }
}
