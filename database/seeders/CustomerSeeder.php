<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::factory()
            ->count(50)
            ->create()
            ->each(function ($customer) {
                // Attach a random number of products to each customer
                $customer->products()->attach(Product::inRandomOrder()->take(rand(1, 5))->get());
            });
    }
}
