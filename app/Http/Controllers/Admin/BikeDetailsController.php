<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BikeDetailsController extends Controller
{
    //bikeDetailsCreatePage
    public function bikeDetailsCreatePage(){
        $company = Brand::get();
        $category = Category::get();
        return view('admin.bikeDetails.create',compact('company','category'));
    }

    //bikeDetails Create
    public function bikeDetailsCreate(Request $request){
        $this->checkValidation($request);
        dd($request->toArray());
    }

    //validation
    private function checkValidation($request){
        $rules = [
            'bike_name' => 'required',
            'bike_image' => 'required|file',
            'brand_id'=> 'required',
            'category_id'=> 'required',
            'engine_power'=> 'required',
            'model_year_from'=> 'required',
            'model_year_to'=> 'required',
            'hp_torque'=> 'required',
            'front_brake'=> 'required',
            'rear_brake'=> 'required',
            'wheel_size'=> 'required',
            'fuel_system'=> 'required',
            'suspension_front'=> 'required',
            'suspension_rear'=> 'required',
            'chain_type'=> 'required',
            'swing_arm'=> 'required',
            'display'=> 'required',
            'headlight'=> 'required',
            'starter'=> 'required',
            'speed'=> 'required',
        ];
        $validator = $request->validate($rules);
    }

}
