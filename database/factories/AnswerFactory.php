<?php

namespace Database\Factories;

use App\Models\Question;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'question_id' => Question::all()->random()->id,
            'answer' => $this->faker->randomElement(['answer_1', 'answer_2', 'answer_3', 'answer_4'])
        ];
    }
}
