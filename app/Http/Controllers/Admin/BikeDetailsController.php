<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bike;
use App\Models\Brand;
use App\Models\Category;
use App\Models\BikeImage;
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

        // dd($request);
        $data = $this->requestData($request);
        Bike::create($data);

        $bikeName = $data['bike_name'];
        $bikeId = Bike::select('bikes.id')
                    ->orderBy('bikes.created_at','desc')
                    ->first();
        // dd($bikeId);

        $directory_path = public_path().'/admin/bikeImages/'.$bikeName;
        if ( $request->hasFile('front_image') ){
            $frontImageName = $bikeName.'_'.uniqid().$request->file('front_image')->getClientOriginalName();
            $request->file('front_image')->move( $directory_path, $frontImageName );
            $image['front_image'] = $frontImageName;
        }

        if ( $request->hasFile('back_image') ){
            $backImageName = $bikeName.'_'.uniqid().$request->file('back_image')->getClientOriginalName();
            $request->file('back_image')->move( $directory_path, $backImageName );
            $image['back_image'] = $backImageName;
        }
        if ( $request->hasFile('right_image') ){
            $rightImageName = $bikeName.'_'.uniqid().$request->file('right_image')->getClientOriginalName();
            $request->file('right_image')->move( $directory_path, $rightImageName );
            $image['right_image'] = $rightImageName;
        }
        if ( $request->hasFile('left_image') ){
            $leftImageName = $bikeName.'_'.uniqid().$request->file('left_image')->getClientOriginalName();
            $request->file('left_image')->move( $directory_path, $leftImageName );
            $image['left_image'] = $leftImageName;
        }
        if ( $request->hasFile('top_image') ){
            $topImageName = $bikeName.'_'.uniqid().$request->file('top_image')->getClientOriginalName();
            $request->file('top_image')->move( $directory_path, $topImageName );
            $image['top_image'] = $topImageName;
        }

        // $directory_path = public_path().'/admin/bikeImages/'.$bikeName;
        // $item->move($directory_path , $imageName);
        $image['bike_id'] = $bikeId->id;
        // dd($image);
        BikeImage::create($image);
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

    // Delete bike details
    public function deleteBikeDetails($id){
        $imageNames = Bike::select('bikes.bike_image')->where('bikes.id',$id)->first();
        $bikeName = Bike::select('bikes.bike_name')->where('bikes.id',$id)->first();
        $imageNameArray = json_decode($imageNames, true);

        if (!is_array($imageNameArray)) {
            $imageNameArray = explode(',', $imageNames);
            }
        // $imageNames = explode(',',$imageName);
        foreach ($imageNameArray as $item){
            $filePath = public_path('/admin/bikeImages/' . $bikeName['bike_name'] . '/' . $item);
            // Debugging: Print the file path \Log::info('Deleting File: ' . $filePath);
            \Log::info('Deleting File: ' . $filePath);
            if (file_exists($filePath)){
                if (unlink($filePath)) {
                    \Log::info('File deleted successfully: ' . $filePath);
                } else {
                    \Log::error('Failed to delete file: ' . $filePath);
                }
            } else {
                \Log::error('File does not exist: ' . $filePath);
            }
        }

        // Delete the parent folder if it is empty
        $parentFolderPath = public_path('/admin/bikeImages/' . $bikeName['bike_name']);
        if (is_dir($parentFolderPath) && count(glob($parentFolderPath . '/*')) === 0) {
            if (rmdir($parentFolderPath)) {
                \Log::info('Parent folder deleted successfully: ' . $parentFolderPath);
            } else {
                \Log::error('Failed to delete parent folder: ' . $parentFolderPath);
            }
        } else {
            \Log::error('Parent folder is not empty or does not exist: ' . $parentFolderPath);
        }

        // Delete the bike details from the database
        if (Bike::where('id', $id)->delete()) {
            \Log::info('Bike details deleted from database for ID: ' . $id);
        } else {
            \Log::error('Failed to delete bike details from database for ID: ' . $id);
        }
        return back()->with('success', 'Bike details deleted successfully!');
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
            'model_year_from'=> $request->model_year_from,
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
