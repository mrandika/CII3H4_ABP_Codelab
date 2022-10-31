<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Warehouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $warehouses = Warehouse::pluck('id')->toArray();
        $brands = Brand::pluck('id')->toArray();

        return [
            'warehouse_id' => fake()->randomElement($warehouses),
            'brand_id' => fake()->randomElement($brands),
            'name' => 'Product ' . fake()->randomNumber(),
            'stock' => fake()->randomNumber(),
            'price' => fake()->randomNumber()
        ];
    }
}
