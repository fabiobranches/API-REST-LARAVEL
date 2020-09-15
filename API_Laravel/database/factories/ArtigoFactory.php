<?php

namespace Database\Factories;

use App\Models\Artigo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Jornalista;

class ArtigoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Artigo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'jornalista_id' => $this->faker->unique()->numberBetween(1, 10),
            'titulo' => $this->faker->name,
            'conteudo' => $this->faker->text,
            'chamada' => $this->faker->text,
            'dataPubli' => $this->faker->dateTimeBetween('now', '+01 days'),
            'statusPubli' => $this->faker->boolean,
        ];
    }
}
