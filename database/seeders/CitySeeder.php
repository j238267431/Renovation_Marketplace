<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    public array $citiesOfCounries = [
        [
            'country_id' => 1,
            'cities'     => [
                1 => 'Москва',
                2 => 'Санкт-Петербург',
                3 => 'Казань',
                4 => 'Новосибирск',
                5 => 'Екатеринбург',
            ],
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        foreach ($this->citiesOfCounries as $country) {
            foreach ($country['cities'] as $id => $city) {
                $data[] = [
                    'id'         => $id,
                    'country_id' => $country['country_id'],
                    'name'       => $city,
                ];
            }
        }

        return $data;
    }
}
