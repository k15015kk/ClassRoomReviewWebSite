<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Building;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function show()
    {
        $model = new Building();
        $data = $model->getData();

        return view('building',['data' => $data]);
    }

}
