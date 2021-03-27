<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public array $categories = [
        1 => ['name' => 'Загородное строительство', 'level' => 0, 'parent_id' => null],
        2 => ['name' => 'Ремонт и отделка',         'level' => 0, 'parent_id' => null],
        3 => ['name' => 'Прочее',                   'level' => 0, 'parent_id' => null],

        4 => ['name' => 'Баня',              'level' => 1, 'parent_id' => 1],
        5 => ['name' => 'Каркасный дом',     'level' => 1, 'parent_id' => 1],
        6 => ['name' => 'Дом из кирпича',    'level' => 1, 'parent_id' => 1],
        7 => ['name' => 'Дом из контейнера', 'level' => 1, 'parent_id' => 1],


        8  => ['name' => 'Ванная комната', 'level' => 1, 'parent_id' => 2],
        9  => ['name' => 'Кухня',          'level' => 1, 'parent_id' => 2],
        10 => ['name' => 'Квартира',       'level' => 1, 'parent_id' => 2],
        11 => ['name' => 'Котедж',         'level' => 1, 'parent_id' => 2],

        12 => ['name' => 'Электромонтаж',         'level' => 1, 'parent_id' => 3],
        13 => ['name' => 'Вентиляция',            'level' => 1, 'parent_id' => 3],
        14 => ['name' => 'Кондиционирование',     'level' => 1, 'parent_id' => 3],
        15 => ['name' => 'Сантехнические работы', 'level' => 1, 'parent_id' => 3],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        foreach ($this->categories as $id => $category) {
            $data[] = [
                'id'        => $id,
                'name'      => $category['name'],
                'level'     => $category['level'],
                'parent_id' => $category['parent_id'],
            ];
        }

        return $data;
    }
}
