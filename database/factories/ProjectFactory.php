<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(2, true),
            'max_group_size' => $this->faker->numberBetween(1, 4),
            'min_group_size' => $this->faker->numberBetween(1, 4),
            'invite_code' => $this->faker->unique()->regexify('[0-9]{6}'),
        ];
    }
}
