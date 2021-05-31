<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use App\Models\Offer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OfferFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Offer::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'company_id'  => Company::query()->inRandomOrder()->first(),
            'category_id' => Category::query()->whereNotNull('parent_id')->inRandomOrder()->first(),
            'name'        => $this->faker->catchPhrase,
            'description' => $this->faker->realText(100),
            'price' => $this->faker->randomNumber(),
            'is_active' => 1,
        ];
    }
}
