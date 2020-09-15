<?php

namespace Database\Seeders;
use App\Models\Jornalista;
use App\Models\Artigo;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        Jornalista::factory(10)->create();
        Artigo::factory(10)->create();
    }
}
