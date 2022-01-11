<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Package;

class PackageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Package::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->word,
            'Price' => $this->faker->numberBetween(-10000, 10000),
            'Discount' => $this->faker->word,
            'Link' => $this->faker->word,
            'Image' => $this->faker->word,
        ];
    }
}
