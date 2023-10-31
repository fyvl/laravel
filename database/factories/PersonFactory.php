<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'last_name' => $this->faker->lastName,
            'name' => $this->faker->firstName,
            'patronymic' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'position' => $this->faker->jobTitle
        ];
    }
}
