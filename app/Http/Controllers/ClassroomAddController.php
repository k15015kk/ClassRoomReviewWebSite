<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Classroom;

class ClassroomAddController extends Controller
{
    public function show($building_id) {
        if (Auth::check()) {
            return view('classroom_add',compact('building_id'));
        }
        else {
            return redirect()->action('BuildingController@show');
        }
    }

    public function check(Request $request,$building_id)
    {
        $classroom_name = $request -> classroomname;

        $model = new Classroom();
        $data = $model -> getClassroomNameData($classroom_name,$building_id);

        if($data -> count() == 0) {
            $classroom_add = $model -> addClassroom($classroom_name,$building_id);
            return redirect()->action(
                'ClassroomController@show',['building_id' => $building_id]
            );
        }
        else 
        {
            return redirect()->action(
                'ClassroomAddController@show',['building_id' => $building_id]
            )->with([
                "status" => "重複しています",
                "classroomname"  => $classroom_name,
            ]);
        }
    }

    public function redirection() {
        return redirect()->action(
            'BuildingController@show'
        );
    }
}
