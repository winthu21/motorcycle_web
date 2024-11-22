<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BikeBrandController extends Controller
{
    //Brand Create Page
    public function brandCreatePage(){
        return view('admin.brand.brandCreate');
    }

    // Brand Create
    public function brandCreate(Request $request){
        // dd($request);
        $this->validationCheck($request,"create");
        $data = $this->requestData($request);

        $imageName = uniqid().$request->file('brand_image')->getClientOriginalName();
        $request->file('brand_image')->move( public_path().'/admin/brandImages/', $imageName);
        $data ['brand_image'] = $imageName;

        Brand::create($data);
        return to_route('brandList');
    }

    // Moto Brand List
    public function brandList(){
        $data = Brand::select('brands.id','brands.brand_name','brands.brand_image')->get();
        // dd($data);
        return view('admin.brand.brandList',compact('data'));
    }

    // Brand Edit Page
    public function brandEditPage($id){
        $data = Brand::select('brands.id','brands.brand_name','brands.brand_image')
                    ->where('brands.id',$id)
                    ->first();

        return view('admin.brand.brandEdit',compact('data'));
    }

    // brand Update
    public function brandEdit(Request $request){
        // dd($request->toArray());
        $this->validationCheck($request,"update");
        $data = $this->requestData($request);
        $oldImageName = $request->oldImageName;

        if( $request->hasFile('brand_image')){
            // dd($request);
            if ( file_exists(public_path('/admin/brandImages/'.$oldImageName)) ){
                // dd($oldImageName);
                unlink(public_path('/admin/brandImages/'.$oldImageName));
            }
            $imageName = uniqid().$request->file('brand_image')->getClientOriginalName();
            $request->file('brand_image')->move( public_path().'/admin/brandImages/', $imageName);
            $data['brand_image'] = $imageName;

        } else {
            $data['brand_image'] = $oldImageName;
        }

        Brand::where('brands.id',$request->brand_id)->update($data);
        return to_route('brandList');
    }

    // delete
    public function brandDelete($id){

        $oldImageName = Brand::select('brands.brand_image')
                                ->where('brands.id',$id)
                                ->first();
        $oldImageName = $oldImageName->brand_image;
        // dd($oldImageName);
        if ( file_exists(public_path('/admin/brandImages/'.$oldImageName)) ){
            // dd("img has");
            unlink(public_path('/admin/brandImages/'.$oldImageName));
        }
        Brand::where('brands.id',$id)->delete();

        return to_route('brandList');
    }

    // validation
    private function validationCheck($request,$action){

        $rules = [
            'brand_name' => 'required'
        ];

        $rules['brand_image'] = $action == "create" ? "required|file": "";
        $validator = $request->validate($rules,[
            'brand_name.required' => 'ဆိုင်ကယ် Company နာမည်ထည့်ပါ'
        ]);
    }

    // Request Data
    private function requestData($request){
        return[
            'brand_name' => $request->brand_name
        ];
    }
}
