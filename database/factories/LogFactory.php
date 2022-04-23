<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Log>
 */
class LogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user=User::factory()->create();
            return [
                'type' => $this->faker->name(),
                'user_id' => $user->id,
                'revenue' => $this->faker->jobTitle(),
                'time' =>now(),
            ];


    }
}
