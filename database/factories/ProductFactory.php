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
        $category_id = Category::pluck('id')->toArray();
      // dd($category_id);
        return [
            'category_id'=>fake()->randomElement($category_id),
            'name'=>fake()->randomElement,
            'description'=>fake()->text,
            'qty_stock'=>fake()->numberBetween(5,10),
            'price'=>fake()->numberBetween(100,500)
        ];
    }
}
