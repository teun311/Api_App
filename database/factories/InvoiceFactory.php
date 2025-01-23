<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'=>$this->faker->numberBetween(1,20),
            'tracking_no'=>$this->faker->numberBetween(10,999),
            'order_date'=>$this->faker->date,
            'due_date'=>$this->faker->date,
            'reference'=>'EMP-'.rand(10,400),
            'sub_total'=>$this->faker->numberBetween(100,1000),
            'discount'=>$this->faker->numberBetween(5,100),
            'total'=>$this->faker->numberBetween(100,5000),


        ];
    }
}
