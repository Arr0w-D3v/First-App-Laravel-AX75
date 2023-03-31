<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'brand' => $this->faker->name,
            'name' => $this->faker->name,
            'color' => $this->faker->colorName,
            'year' => $this->faker->year,
            'price_hvat' => $this->faker->randomNumber(),
            'price_vat' => $this->faker->randomNumber(),
            'description' => $this->faker->text,
            'is_active' => $this->faker->boolean,
        ];
    }
}
