<?php

namespace Database\Factories\GestionTasks;

use App\Models\GestionProjets\Projet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\GestionTasks\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->text(7),
            'description' => fake()->text(10),
            'project_id' => Projet::factory(),
        ];
    }
}
