<?php

namespace Database\Seeders;

use App\Models\Filme;
use Illuminate\Database\Seeder;

class FilmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Filme::factory(9)->create();
    }
}
