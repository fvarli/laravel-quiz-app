<?php

namespace Database\Factories;
use App\Models\Result;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResultFactory extends Factory
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
            'quiz_id' => rand(1,10),
            'point' => rand(1,100),
            'correct' => rand(1,20),
            'wrong' => rand(1,20)
        ];
    }
}
