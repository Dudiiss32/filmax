<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Filme;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CategoriaFilmeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'filme_id' => Filme::inRandomOrder()->value('id'),
            'categoria_id' => Categoria::inRandomOrder()->value('id')
        ];
    }
}
