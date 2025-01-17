<?php

namespace Database\Factories;

use App\Models\Category;
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
    public function definition(): array
    {
        $catehory_id = Category::pluck(id)->toArray();
        return [
            'category_id'=>$catehory_id,
            'name'=>fake()->randomElement,
            'description'=>fake()->text,
            'qty_stock'=>fake()->numberBetween(5,20),
            'price'=>fake()->numberBetween(200,500)
        ];
    }
}
