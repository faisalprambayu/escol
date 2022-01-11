<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Video;

class VideoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Video::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Title' => $this->faker->word,
            'Video' => $this->faker->word,
            'Link' => $this->faker->word,
            'Text1' => $this->faker->word,
            'Text2' => $this->faker->word,
        ];
    }
}
