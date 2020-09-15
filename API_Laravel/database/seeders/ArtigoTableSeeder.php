<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ArtigoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Cria 10 jornalistasp
        factory(App\Models\Artigo:: class, 10)->create();
    }
}
