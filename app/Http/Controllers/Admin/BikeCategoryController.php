<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BikeCategoryController extends Controller
{
    //Bike Category Page
    public function bikeCategoryPage(){
        return view('admin.category.list');
    }
}
