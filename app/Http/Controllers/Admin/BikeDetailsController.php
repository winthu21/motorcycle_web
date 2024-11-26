<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BikeDetailsController extends Controller
{
    //bikeDetailsCreatePage
    public function bikeDetailsCreatePage(){
        return view('admin.bikeDetails.create');
    }

    //bikeDetails Create
    public function bikeDetailsCreate(Request $request){
        dd($request->toArray());
    }
}
