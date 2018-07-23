<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
