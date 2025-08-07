<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Filme>
 */
class FilmeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nome' => fake()->realText(20),
            'sinopse' => fake()->realText(1000),
            'ano' => fake()->numberBetween(1900, now()->year),
            'imagem' => 'https://source.unsplash.com/random',
            'link' => fake()->url(),
        ];
    }
}
