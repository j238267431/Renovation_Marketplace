<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public array $countries = [
        1 => 'Российская Федерация',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('countries')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        foreach ($this->countries as $id => $country) {
            $data[] = [
                'id'   => $id,
                'name' => $country,
            ];
        }

        return $data;
    }
}
