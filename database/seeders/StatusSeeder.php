<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    public array $statuses = [
        'Создан',
        'Принят',
        'Выполняется',
        'Выполнен',
        'Подтверждён',
        'Отмена'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        foreach ($this->statuses as $status) {
            $data[] = ['name' => $status];
        }

        return $data;
    }
}
