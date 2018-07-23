<?php

use Illuminate\Database\Seeder;

class BuildingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('building')->insert([
            'building_name' => "１号館", 
        ]);
    }
}
