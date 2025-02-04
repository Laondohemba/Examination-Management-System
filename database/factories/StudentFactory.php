<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'examiner_id' => 1,
            'examination_id' => 1,
            'name' => fake()->name(),
            'reg_no' => fake()->numberBetween(10000000, 50000000),
            'email' => fake()->email(),
            'phone' => fake()->numberBetween(10000000, 50000000),
            'password' => Hash::make(123),
        ];
    }
}
