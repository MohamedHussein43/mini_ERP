<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
//use App\Models\Product;
use Illuminate\Support\Str;
use Laravel\Jetstream\Features;
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
            'name' => json_encode([
                'ar' => $this->faker->name(),
                'en' => $this->faker->name()
            ]),
            'description' => json_encode([
                'ar' => $this->faker->sentence(),
                'en' => $this->faker->sentence()
            ]),
            "price" => rand(5,1000)
        ];
    }
}
