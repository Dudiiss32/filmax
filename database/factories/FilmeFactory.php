<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;

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

        $files = Storage::disk('public')->files('filmesSeeder');

        $publicPaths = array_map(fn($file) => 'storage/' . $file, $files);

        $ytLinks = [
            'https://www.youtube.com/watch?v=swzTZ2mQypM',
            'https://www.youtube.com/watch?v=KLSt-1iPMBc',
            'https://www.youtube.com/watch?v=FkT-LM8JxCs',
            'https://www.youtube.com/watch?v=y_-YWEot_7w',
            'https://www.youtube.com/watch?v=dSQ3yN5yJ0g',
            'https://www.youtube.com/watch?v=HhesaQXLuRY&t=2s',
            'https://www.youtube.com/watch?v=gi7tGKMznXA',
        ];

        return [
            'nome' => fake()->realText(20),
            'sinopse' => fake()->realText(1000),
            'ano' => fake()->numberBetween(1900, now()->year),
            'imagem' => fake()->randomElement($publicPaths),
            'link' => fake()->randomElement($ytLinks),
        ];
    }
}
