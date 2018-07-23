<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use APP\Building;

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

        return view('classroom',['data' => $data]);
    }
}
