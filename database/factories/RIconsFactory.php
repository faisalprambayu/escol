<?php

namespace Database\Factories;

use App\Models\RIcon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class RIconFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RIcon::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->word,
            'Icon' => $this->faker->word,
            'Color' => $this->faker->word,
        ];
    }
}
