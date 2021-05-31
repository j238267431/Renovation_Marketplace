<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    protected function getImage()
    {
        $imagePath = '/img/house/house_' . random_int(1,6) . '.jpg';
        return $imagePath;
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           // 'name' => $this->faker->catchPhrase,
            'name' => $this->faker->company,
            'phone' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->address,
            'cover' => $this->getImage(),
            'description' => $this->faker->realText(200),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
