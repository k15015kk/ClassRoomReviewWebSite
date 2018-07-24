<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Review;
use App\Classroom;
use App\Building;

class ReviewWritterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show($classroom_id) {
        if (Auth::check()) {
            return redirect()->action(
                'ReviewController@show', ['classroom_id' => $classroom_id]
            );
        }
        else {
            $classroomModel = new Classroom();
            $classroom_data = $classroomModel -> getClassroomData($classroom_id);

            $buildingModel = new Building();
            $building_data = $buildingModel -> getBuildingData($classroom_data -> building_id);

            return view('review_write',compact('classroom_data','building_data','classroom_id'));
        }
        
    }

    public function check(Request $request,$classroom_id)
    {
        $star = $request -> star;
        $username = $request -> username;
        $review = $request -> review;

        if($star != 0) 
        {
            $model = new Review();
            $review_write = $model -> writeData($classroom_id,$username,$review,$star);

            $classroomModel = new Classroom();
            $classroomModel -> updateStarAverage($classroom_id);
    
            return redirect()->action(
                'ReviewController@show', ['classroom_id' => $classroom_id]
            );
        }
        else
        {
            return redirect()->action(
                'ReviewWritterController@show', ['classroom_id' => $classroom_id]
            )->with([
                "status" => "星を選択してください",
                "username"  => $username,
                "review" => $review
                ]);
        } 
        
    }
    
    public function redirection() {
        return redirect()->action(
            'BuildingController@show'
        );
    }
}
