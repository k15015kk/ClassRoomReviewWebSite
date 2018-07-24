<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use App\Classroom;
use App\Building;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function show($classroom_id) {
        $model = new Review();
        $data = $model->getData($classroom_id);

        $classroomModel = new Classroom();
        $classroom_data = $classroomModel -> getClassroomData($classroom_id);

        if(empty($classroom_data))
        {
            return redirect()->action(
                'BuildingController@show'
            ); 
        }
        else 
        {
            $buildingModel = new Building();
            $building_data = $buildingModel -> getBuildingData($classroom_data -> classroom_id);

            return view('review',compact('data','classroom_data','building_data'));
        }

    }

    public function delete(Request $request,$review_id) {
        $review_id = $request -> reviewid;
        $classroom_id = $request -> classroomid;

        $model = new Review();

        $delete = $model -> deleteReview($review_id);

        $classroomModel = new Classroom();
        $classroomModel -> updateStarAverage($classroom_id);

        return redirect()->action(
            'ReviewController@show', ['classroom_id' => $classroom_id]
        );
    }

    public function redirection() {
        return redirect()->action(
            'BuildingController@show'
        );
    }
}
