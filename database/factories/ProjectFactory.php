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

    protected function getImage()
    {
        $imagePath = '/img/project/project_' . random_int(1,30) . '.jpg';
        return $imagePath;
    }

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
            'cover' => $this->getImage(),
            //'description' => $this->faker->sentence(mt_rand(4, 10)),
            'description' => $this->faker->realText(100),
            'content' => $this->faker->realText(200),
        ];
    }
}
