<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brands::factory()->count(10)->create();
    }
}
