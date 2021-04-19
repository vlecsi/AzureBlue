<?php

namespace Database\Factories;

use App\Models\Carte;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CarteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Carte::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'autor' => $this->faker->name,
            'titlu' => $this->faker->text($maxNbChars = 200),
            'editura' => $this->faker->streetName,
            'aparitie' => $this->faker->numberBetween($min = 1400, $max = 2021),
            'isbn' => $this->faker->numerify('#############################'),

        ];
    }
}
