<?php

namespace Database\Factories;

use App\Models\Modal;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ModalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Modal::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Title' => $this->faker->word,
            'Image' => $this->faker->word,
        ];
    }
}
