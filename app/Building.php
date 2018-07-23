<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Building extends Model
{
    protected $table = 'building';
    protected $guarded = array('building_id');

    public $timestamps = false;

    function getData() {
        $data = DB::table($this->table)->get();

        return $data;
    }

    function getBuildingData($building_id) {
        $data = DB::table($this->table) -> where('building_id',$building_id) -> first();

        return $data;
    }
}
