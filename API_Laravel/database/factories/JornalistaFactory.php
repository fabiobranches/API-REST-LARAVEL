<?php

namespace Database\Factories;

use App\Models\Jornalista;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class JornalistaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jornalista::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'rg' => $this->faker->numberBetween($min = 10000000, $max = 99999999) ,
            'dataAdimissao' => $this->faker->dateTimeBetween('now', '+01 days'),
            'statusPerfil' => $this->faker->boolean,
        ];
    }
}
