<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'company_id' => Company::query()->inRandomOrder()->first(),
            'category_id' => Category::query()->whereNotNull('parent_id')->inRandomOrder()->first(),
            'name' => $this->faker->catchPhrase,
            'price' => $this->faker->randomNumber(),
            'cover' => $this->faker->imageUrl(150, 150, 'building'),
            'description' => $this->faker->sentence(mt_rand(4, 10)),
            'content' => $this->faker->text,
        ];
    }
}
