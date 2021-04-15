<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Model;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::query()->inRandomOrder()->first(),
            'title' => $this->faker->text(10),
            'description' => $this->faker->sentence,
            'budget' => $this->faker->numberBetween(1000,99999),
            'category_id' => Category::query()->inRandomOrder()->first(),
            'is_active' => $this->faker->boolean(60),
        ];
    }
}
