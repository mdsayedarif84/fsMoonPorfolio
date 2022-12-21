<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ServiceController extends Controller{
    public function index(){
        // $categories   =   Category::where('status',1)->get();
        return view('admin.service.addService');
    }
}
