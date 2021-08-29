<?php

namespace Database\Factories;

use App\Models\Brands;
use App\Models\Planes;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Planes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstNameFemale ,
            "image" => "uploads/planes/" .  $this->faker->image(storage_path('app/public/uploads/planes'), $width = 640, $height = 480, 'cats', false),
            "brand_id" => Brands::all()->random()->id

        ];
    }
}
