<?php

namespace Database\Factories;

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
        return [

            'name' => $this->faker->name,
            'description' => $this->faker->text(100),
            'price_buy' => $this->faker->randomFloat(2, 1, 100),
            'price_sell' => $this->faker->randomFloat(2, 1, 100),
            'stock' => $this->faker->randomNumber(2),

            //
        ];
    }
}
