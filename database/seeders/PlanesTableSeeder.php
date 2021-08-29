<?php

namespace Database\Seeders;

use App\Models\Planes;
use Illuminate\Database\Seeder;

class PlanesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Planes::factory()->count(10)->create();

    }
}
