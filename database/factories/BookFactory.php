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
            'title' => $this->faker->word(),
            'author' => $this->faker->name(),
            'category' => $this->faker->word(),
            'description' => $this->faker->text(50),
            'publishing_house' => $this->faker->company(),
            'publishing_date' => now(),
        ];
    }
}
