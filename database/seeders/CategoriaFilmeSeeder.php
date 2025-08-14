<?php

namespace Database\Seeders;

use App\Models\CategoriaFilme;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaFilmeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CategoriaFilme::factory(30)->create();
    }
}
