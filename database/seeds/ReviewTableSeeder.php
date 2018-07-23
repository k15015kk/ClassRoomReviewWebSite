<?php

use Illuminate\Database\Seeder;

class ReviewTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('review')->insert([
            'classroom_id' => 1,
            'username' => "testuser",
            'star' => 3,
            'review' => 'この教室は広くて使いやすいです',
            'delete_flag' => false,
        ]);
    }
}
