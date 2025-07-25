<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class WeightLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'user_id' => User::factory(),
            'date' => $this->faker->dateTimeBetween('-35 days', 'now')->format('Y-m-d'),
            'weight' => $this->faker->randomFloat(1, 40, 120), // 40kg〜120kg
            'calories' => $this->faker->numberBetween(1500, 3500),
            'exercise_time' => $this->faker->optional()->time(),
            'exercise_content' => $this->faker->optional()->sentence(),  
        ];
    }
}
