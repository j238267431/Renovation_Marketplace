<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Order;
use App\Models\Status;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => User::query()->inRandomOrder()->first(),
            'company_id' => Company::query()->inRandomOrder()->first(),
            'status_id' => Status::query()->inRandomOrder()->first(),
            'details' => $this->faker->sentence,
        ];
    }
}
