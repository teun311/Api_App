<<<<<<< HEAD
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id'=>$this->faker->numberBetween(1,1000),
            'product_id'=>$this->faker->numberBetween(1,500),
            'unit_price'=>$this->faker->numberBetween(5,999),
            'quantity'=>$this->faker->numberBetween(1,10),

        ];
    }
}
=======
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InvoiceItem>
 */
class InvoiceItemFActoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id'=>$this->faker->numberBetween(1,1000),
            'product_id'=>$this->faker->numberBetween(1,500),
            'unit_price'=>$this->faker->numberBetween(5,999),
            'quantity'=>$this->faker->numberBetween(1,10),

        ];
    }
}
>>>>>>> de70adb74a5a3f0078c1637ee7e98dc5c8c150c5
