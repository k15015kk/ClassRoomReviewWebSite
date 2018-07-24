<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Building;

class BuildingAddController extends Controller
{
    public function show() {
        if (Auth::check()) {
            return view('building_add');
        }
        else {
            return redirect()->action('BuildingController@show');
        }
    }

    public function check(Request $request)
    {
        $building_name = $request -> buildingname;

        $model = new Building();
        $data = $model -> getBuildingNameData($building_name);

        if($data -> count() == 0) {
            $building_add = $model -> addBuilding($building_name);
            return redirect()->action(
                'BuildingController@show'
            );
        }
        else 
        {
            return redirect()->action(
                'BuildingAddController@show'
            )->with([
                "status" => "重複しています",
                "buildingname"  => $building_name,
            ]);
        }
    }


    public function redirection() {
        return redirect()->action(
            'BuildingController@show'
        );
    }
}
