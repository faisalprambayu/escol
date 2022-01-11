<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Registration;

class RegistrationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Registration::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->word,
            'Email' => $this->faker->word,
            'Handphone' => $this->faker->numberBetween(-10000, 10000),
            'School_Origin' => $this->faker->word,
            'Class' => $this->faker->numberBetween(-10000, 10000),
            'Major' => $this->faker->numberBetween(-10000, 10000),
            'Package' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
