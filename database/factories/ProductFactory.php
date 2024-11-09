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
        return [
            'name' => $this->faker->unique()->word,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 1, 100),
            'category_id' => Category::factory(), // Kategori fabrikası
            'stock' => $this->faker->numberBetween(1, 100),
            'image_url' => "https://lh3.googleusercontent.com/pw/AP1GczP3lDv2LeAD811wT5tO0_qSwBfFuthHcLMkp51iJXsMqSZpNNfqaP_-l7KGoLJNvsUyAmanEtg1CczfUSqHwhhq6vGo19q3moF4HonXhigWRPq8bX4ZHfNkYB4zJWLdH9uTgEZIsYz2vGPpyqAzrVQL7g=w560-h747-s-no?authuser=0"
            
        ];
    }
}
