<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AnswerFactory extends Factory
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
            'user_id' => fake()->randomDigit(),
            'question_id' => fake()->randomDigit(),
            'reposta' => $var_options[array_rand($var_options)],
            'hit' => fake()->boolean,
        ];
    }
}
