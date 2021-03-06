<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Image;
use App\Models\Offer;
use App\Models\Project;
use App\Models\Review;
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
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);

        $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        Company::factory(20)->create();
        $this->call(StatusSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(CategorySeeder::class);
        Offer::factory(100)->create();
        Review::factory(100)->create();
        Project::factory(30)->create();
        Image::factory(90)->create();
    }
}
