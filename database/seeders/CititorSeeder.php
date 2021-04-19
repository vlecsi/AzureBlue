<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cititor;

class CititorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cititor::factory()->times(100)->create();
    }
}
