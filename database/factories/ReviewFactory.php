<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Review;
use App\Models\User;
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
        $companyId = $userId = $unique_key = null;

        $companyMaxId = Company::query()->max('id');
        $userMaxId = User::query()->max('id');

        while (!$unique_key) {
            $companyId = mt_rand(1, $companyMaxId);
            $userId = mt_rand(1, $userMaxId);
            $unique_key = $this->faker
                ->unique()
                ->passthrough($companyId . '-' . $userId);
        }

        return [
            'company_id' => $companyId,
            'user_id' => $userId,
            'title' => $this->faker->sentence,
            'content' => $this->faker->text,
            'rating' => $this->faker->numberBetween(1, 5),
            'recommend' => $this->faker->boolean(70),
        ];
    }
}
