<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Building;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */
    
    public function show($building_id)
    {
        $model = new Classroom();
        $data = $model->getData($building_id);

        $buildingModel = new Building();
        $buildingAllData = $buildingModel -> getData();

        if(intval($building_id) > $buildingAllData -> count()) {
            return redirect()->action(
                'BuildingController@show'
            ); 
        }
        else 
        {
            $model = new Classroom();
            $data = $model->getData($building_id);

            return view('classroom',compact('data','building_id'));
        }


    }
}
