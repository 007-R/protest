<?php

namespace Database\Seeders;

use App\Models\Administrator;
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
        $this->call(UsersTableSeeder::class);
        $this->call(AreasTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(ShopsTableSeeder::class);
        $this->call(AdministratorsTableSeeder::class);
        $this->call(MastersTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
    }
}
