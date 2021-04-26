<?php

namespace Database\Factories;

use App\Models\Country;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $country = Country::query()->inRandomOrder()->first()->load('cities');

        return [
            'birthday'   => $this->faker->optional()->dateTimeThisCentury(),
            'avatar'     => $this->faker->optional()->imageUrl(150, 150, 'people'),
            'country_id' => $country->id,
            'city_id'    => $country->cities->random()->id,
            'address'    => $this->faker->optional()->address,
        ];
    }
}
