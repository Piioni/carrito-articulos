<?php

namespace Database\Factories;

use App\Models\Sugerencia;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Sugerencia>
 */
class SugerenciaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->sentence(),
            'texto' => $this->faker->paragraphs(3, true),
            'user_id' => User::factory(),
        ];
    }
}
