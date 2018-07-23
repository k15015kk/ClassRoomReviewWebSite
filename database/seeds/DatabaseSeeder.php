<?php

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
        $this->call(BuildingTableSeeder::class);
        $this->call(ClassroomTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
    }
}
