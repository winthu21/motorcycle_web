<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashBoardController extends Controller
{
    //admin home
    public function index(){
        return view('admin.home');
    }
}