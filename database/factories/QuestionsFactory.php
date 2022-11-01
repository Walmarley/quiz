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
        $var_options = ['a','b','c','d'];

        return [
            'quest' => fake()->sentence(),
            'correctOption' => $var_options[array_rand($var_options)],
            'optionA' => fake()->name(),
            'optionB' => fake()->name(),
            'optionC' => fake()->name(),
            'optionD' => fake()->name(),
            'optionE' => fake()->name(),
        ];
    }
}
