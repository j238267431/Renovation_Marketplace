<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Image;
use App\Models\Offer;
use App\Models\Project;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Seeder;

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
        Company::factory(20)->create();
        $this->call(StatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);
        Offer::factory(25)->create();
        Review::factory(10)->create();
        Project::factory(15)->create();
        Image::factory(40)->create();
    }
}
