<?php

namespace Database\Factories;

use App\Models\Brands;
use Illuminate\Database\Eloquent\Factories\Factory;

class BrandsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Brands::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->firstNameFemale ,
            'address' => $this->faker->address,
            "image" => "uploads/brands/" .  $this->faker->image(storage_path('app/public/uploads/brands'), $width = 640, $height = 480, 'cats', false),


        ];
    }
}
