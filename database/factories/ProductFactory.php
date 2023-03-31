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
    public function definition()
    {
        return [
            'reference' => $this->faker->unique()->regexify('[A-Z]{3}[0-9]{3}'),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(50),
            'price' => $this->faker->numberBetween(1, 100000),
            'stock' => $this->faker->numberBetween(1, 250),
            'is_active' => $this->faker->boolean(),
            'created_by' => $this->faker->numberBetween(1, 10),
            'updated_by' => $this->faker->numberBetween(1, 10),
        ];
    }
}
