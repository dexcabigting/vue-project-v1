<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3),
            'author' => $this->faker->name(),
            'category' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'publishing_house' => $this->faker->company() . " " . $this->faker->companySuffix(),
            'publishing_date' => now(),
        ];
    }
}
