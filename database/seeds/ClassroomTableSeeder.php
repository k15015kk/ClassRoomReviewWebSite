<?php

use Illuminate\Database\Seeder;

class ClassroomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classroom')->insert([
            'building_id' => 1,
            'classroom_name' => "502",
            'star_average' => 3.4,
        ]);

        DB::table('classroom')->insert([
            'building_id' => 1,
            'classroom_name' => "501",
            'star_average' => 3.5,
        ]);
    }
}
