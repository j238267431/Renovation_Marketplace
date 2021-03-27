<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Company::factory(5)->create();
        $this->call(StatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);
    }
}
