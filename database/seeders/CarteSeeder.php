<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Carte;

class CarteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Carte::factory()->times(5)->create();
    }
}
