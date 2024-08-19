<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Idea>
 */
class ExerciceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 20),
            'language_id'=> $this->faker->numberBetween(1, 6),
            'module_id' => $this->faker->numberBetween(1, 4),
            'title' => ucwords($this->faker->words(4, true)),
            'description' => $this->faker->paragraph(5),
            'codeblock' => $this->faker->paragraph(5),
        ];
    }
}
