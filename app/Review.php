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
        $data = DB::table($this -> table)->where([
            ['classroom_id','=',$classroom_id],
            ['delete_flag','=',false]
        ])->get();

        return $data;
    }

    function deleteReview($review_id) {
        DB::table($this -> table)
            ->where('review_id', $review_id)
            ->update(['delete_flag' => true]);
    }

    function writeData($classroom_id,$username,$review,$star) {
        DB::table($this -> table) -> insert(
            [
                'classroom_id' => $classroom_id,
                'username' => $username,
                'star' => $star,
                'review' => $review,
                'delete_flag' => false
            ]
        );

        
    }
}
