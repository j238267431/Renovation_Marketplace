<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::factory()->create()->id,
            'category_id' => Category::query()->inRandomOrder()->first(),
            'title' => $this->faker->catchPhrase,
            'content' => $this->faker->realText(200),
            'rating' => $this->faker->numberBetween(1, 5),
            'recommend' => $this->faker->boolean(70),
        ];
    }
}
