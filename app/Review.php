<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Review extends Model
{
    protected $table = 'review';
    protected $guarded = array('review_id');

    public $timestamps = false;

    function getData($classroom_id) {
        $data = DB::table($this->table)->where('classroom_id', $classroom_id)->get();

        return $data;
    }
}
