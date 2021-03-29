<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public array $roles = ['Владелец', 'Менеджер'];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert($this->getData());
    }

    private function getData(): array
    {
        $data = [];

        foreach ($this->roles as $role) {
            $data[] = ['name' => $role];
        }

        return $data;
    }
}
