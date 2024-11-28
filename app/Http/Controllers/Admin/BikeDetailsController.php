<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bike;
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
        // $this->checkValidation($request);

        $data = $this->requestData($request);
        $bikeName = $data['bike_name'];

        foreach ($request->file('bike_image') as $item){
            $imageName = $bikeName.'_'.$item->getClientOriginalName();
            $directory_path = public_path().'/admin/bikeImages/'.$bikeName;
            $item->move($directory_path , $imageName);
            $data ['bike_image'][] = $imageName;
        }
        $data['bike_image'] = $string_version = implode(',', $data['bike_image']);

        Bike::create($data);
        return to_route('bikeDetailsCreatePage');
    }

    // bike details page
    public function bikeDetailsListPage(){
        $data = Bike::select('bikes.id','bikes.bike_name','bikes.engine_power','bikes.bike_image','brands.brand_name','categories.category_name')
                    ->leftJoin('brands','bikes.brand_id','brands.id')
                    ->leftJoin('categories','bikes.category_id','categories.id')
                    ->get();

        foreach ($data as $item){
            $item->bike_image = explode(",",$item->bike_image);
        }

        return view('admin.bikeDetails.list',compact('data'));
    }

    // Bike specs Details Page
    public function bikeDetailsPage($id){
        $data = Bike::select('bikes.*','brands.brand_name','categories.category_name')
                            ->leftJoin('brands','bikes.brand_id','brands.id')
                            ->leftJoin('categories','bikes.category_id','categories.id')
                            ->where('bikes.id',$id)
                            ->first();
        $data['bike_image'] = explode(",",$data['bike_image']);
        // dd($data);
        return view('admin.bikeDetails.detail',compact('data'));
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

    // request data
    private function requestData($request){
        return[
            'bike_name' => $request->bike_name,
            // 'bike_image' => $request->bike_image,
            'brand_id'=> $request->brand_id,
            'category_id'=> $request->category_id,
            'engine_power'=> $request->engine_power,
            'model_year'=> $request->model_year,
            'model_year_to'=> $request->model_year_to,
            'bike_code_name' => $request->bike_code_name,
            'chassis' => $request->chassis,
            'hp_torque'=> $request->hp_torque,
            'front_brake'=> $request->front_brake,
            'rear_brake'=> $request->rear_brake,
            'wheel_size'=> $request->wheel_size,
            'fuel_system'=> $request->fuel_system,
            'suspension_front'=> $request->suspension_front,
            'suspension_rear'=> $request->suspension_rear,
            'chain_type'=> $request->chain_type,
            'swing_arm'=> $request->swing_arm,
            'display'=> $request->display,
            'headlight'=> $request->headlight,
            'frame' => $request->frame,
            'weight' => $request->weight,
            'starter'=> $request->starter,
            'speed'=> $request->speed,
        ];
    }
}
