<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Review;

class Classroom extends Model
{
    //
    protected $table = 'classroom';
    protected $guarded = array('classroom_id');

    public $timestamps = false;

    function getData($building_id) {
        $data = DB::table($this->table)->where('building_id', $building_id)->get();

        return $data;
    }

    function getClassroomData($classroom_id) {
        $data = DB::table($this->table)->where('classroom_id',$classroom_id)-> first();

        return $data;
    }

    function getClassroomNameData($classroom_name,$building_id) {
        $data = DB::table($this->table) -> where([
            ['classroom_name','=',$classroom_name],
            ['building_id','=',$building_id]
        ]) -> get();;

        return $data;
    }

    function addClassroom($classroom_name,$building_id) {
        DB::table($this -> table) -> insert([
            'classroom_name' => $classroom_name,
            'building_id' => $building_id,
            'star_average' => 0.0,
        ]);
    }

    function updateStarAverage($classroom_id) {
        $reviewModel = new Review();
        $data = $reviewModel -> getData($classroom_id);

        $starSum = 0;
        $starCount = $data -> count();
        $starAverage = 0.0;

        foreach ($data as $d) {
            $starSum = $starSum + $d -> star;
        }

        if($starCount == 0) {
            $starAverage = 0.0;
        } 
        else 
        {
            $starAverage = $starSum / $starCount;
        }

        DB::table($this -> table)
            ->where('classroom_id', $classroom_id)
            ->update(['star_average' => $starAverage]);
    }
}
