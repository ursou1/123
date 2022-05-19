<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = $this->faker->unique()->word();
        return [
            'slug'=> Str::slug($title),
            'title' => $title,
            'image' => $this->faker->imageUrl($width =300, $height=300, 'cats'),
            'description' =>$this->faker->text($maxNbChars = 100),
            'cost' =>$this->faker->numberBetween($min = 1000, $max = 9000),
            'category_id' => $this->faker->numberBetween($min = 1, $max = 5)
            ];
    }
}
