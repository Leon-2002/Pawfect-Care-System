<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \Illuminate\Database\Eloquent\Factories\Factory\App\Models\Services;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //

            'ServiceName' => fake()->randomElement([ ,'Pet Sitter', 'Pet Boarding', 'Pet Grooming', 'Pet Healthcare']),
           'Price' => fake()->numberBetween($min = 500, $max = 6000),
           'description' =>fake()->paragraph,


        ];
    }
}
