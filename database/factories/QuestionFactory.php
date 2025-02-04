<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'examination_id' => 1,
            'type' => 'multiple_choice',
            'question' => fake()->sentence(10),
            'option_one' => $optionOne = fake()->sentence(6),
            'option_two' => $optionTwo = fake()->sentence(6),
            'option_three' => $optionThree = fake()->sentence(6),
            'option_four' => $optionFour = fake()->sentence(6),
            'option_five' => $optionFive = fake()->sentence(6),
            'answer' => fake()->randomElement([$optionOne, $optionTwo, $optionThree, $optionFour, $optionFive]),
            'marks' => 2,
        ]; 
        
        // return [
        //     'examination_id' => 1,
        //     'type' => 'theory',
        //     'question' => $question = fake()->sentence(10),
        //     'answer' => $question,
        //     'marks' => 10,
        // ];
    }
}
