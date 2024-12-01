<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BikeCategoryController extends Controller
{
    //Bike Category Page
    public function categoryListPage(){
        $data = Category::select('categories.id','categories.category_name','categories.category_image')->get();
        return view('admin.category.list',compact('data'));
    }

    // Category Create Page
    public function categoryCreatePage(){
        return view('admin.category.create');
    }

    // category create
    public function categoryCreate(Request $request){
        // dd($request);
        $this->validationCheck($request,"create");
        $data = $this->requestData($request);
        // dd($data);
        $image_name = uniqid().$request->file('category_image')->getClientOriginalName();
        // dd($image_name);
        if ( $request->hasFile('category_image') ){
            $request->file('category_image')->move( public_path().'/admin/categoryImages/',$image_name);
            $data['category_image'] = $image_name;
        }

        Category::create($data);

        return to_route('categoryCreatePage');
    }

    //category update page
    public function categoryUpdatePage($id){
        $data = Category::where('categories.id',$id)->first();
        return view('admin.category.edit',compact('data'));
    }

    // category Update
    public function categoryUpdate(Request $request){

        $this->validationCheck($request,"update");
        $data = $this->requestData($request);
        $oldImageName = $request->oldImageName;

        // dd($request->toArray());
        if( $request->hasFile('category_image')){
            // dd($request);
            if ( file_exists(public_path('/admin/categoryImages/'.$oldImageName)) ){
                // dd($oldImageName);
                unlink(public_path('/admin/categoryImages/'.$oldImageName));
            }
            $imageName = uniqid().$request->file('category_image')->getClientOriginalName();
            $request->file('category_image')->move( public_path().'/admin/categoryImages/', $imageName);
            $data['category_image'] = $imageName;

        } else {
            $data['category_image'] = $oldImageName;
        }

        Category::where('categories.id',$request->category_id)->update($data);
        return to_route('categoryListPage');
    }

    // category delete
    public function categoryDelete($id){
        // dd($id);
        $oldImageName = Category::select('categories.category_image')
                                ->where('categories.id',$id)
                                ->first();
        $oldImageName = $oldImageName->category_image;
        // dd($oldImageName);
        if ( file_exists(public_path('/admin/categoryImages/'.$oldImageName)) ){
            // dd("img has");
            unlink(public_path('/admin/categoryImages/'.$oldImageName));
        }
        Category::where('categories.id',$id)->delete();

        return to_route('categoryListPage');
    }

    // validation check
    private function validationCheck($request,$action){
        $rules = [
            'category_name' => 'required',
        ];

        $rules['category_image'] = $action == "create" ? "required|file" : "";
        $validator = $request->validate($rules);
    }

    // request data
    private function requestData($request){
        return [
            'category_name' => $request->category_name
        ];
    }
}
