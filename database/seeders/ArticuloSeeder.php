<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Articulo;

class ArticuloSeeder extends Seeder
{
    public function run(): void
    {
        Articulo::factory()->count(30)->create();
    }
}
