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

        $buildingModel = new Building();
        $building_data = $buildingModel -> getBuildingData($classroom_data -> building_id);

        return view('review',compact('data','classroom_data','building_data'));
    }
}
