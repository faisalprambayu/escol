<?php

namespace Database\Factories;

use App\Models\Friend;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FriendFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Friend::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Name' => $this->faker->word,
            'Date' => $this->faker->word,
            'Description' => $this->faker->word,
            'Image' => $this->faker->word,
            'Text' => $this->faker->word,
        ];
    }
}
