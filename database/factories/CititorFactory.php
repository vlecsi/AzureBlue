<?php

namespace Database\Factories;

use App\Models\Cititor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class CititorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cititor::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return [
            'nr_permis' => $this->faker->numerify('MM#####'),
            'nume' => $this->faker->lastName,
            'prenume' => $this->faker->firstName,
            'email' => $this->faker->email,
            'cnp' => $this->faker->phoneNumber,
           ]; 
    }
}
