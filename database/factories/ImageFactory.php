<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'project_id' => Project::query()->inRandomOrder()->first(),
            'path' => $this->faker->imageUrl(300, 300, 'Awesome building'),
        ];
    }
}
