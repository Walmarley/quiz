<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Questions>
 */
class QuestionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'quest' => fake()->sentence(),
            'correrct' => fake()->name(),
            'wrong2' => fake()->randomNumber(2, true),
            'wrong3' => fake()->randomNumber(3, true),
            'wrong4' => fake()->randomNumber(4, true)
        ];
    }
}
