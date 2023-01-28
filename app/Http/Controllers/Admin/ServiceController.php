<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;


class ServiceController extends Controller{
    public function index(){
        $categories   =   Category::where('status',1)->get();
        return view('admin.service.addService',['categories' => $categories]);
    }
    protected function validationAbout($request){
        $this->validate($request,
            [
                'q_heading' => 'required|regex:/^[a-zA-Z\s?]*$/',
                'category_id' => 'required',
                'heading_name' => 'required',
                'short_msg' => 'required',
                'status' => 'required',
            ],
            [
                'q_heading.required' => 'Write Your Question?',
                'q_heading.regex' => 'Letter, Question Mark & Space only Accepted!',
                'category_id.required' => 'Select Category name!',
                'heading_name.required' => 'Write About Myself!',
                'short_msg.required' => 'Write something You Know!',
                'status.required' => 'You have to choose type status!'
            ]
        );
    }
    public function saveAboutInfo(Request $request){
        $this->validationAbout($request);
        $about = new About();
        $about->title = $request->title;
        $about->category_id = $request->category_id;
        $about->about_us = $request->about_us;
        $about->short_msg = $request->short_msg;
        $about->status = $request->status;
        $about->save();
        return redirect('/about')->with('message', 'About Save Successfully ');;
    }
}
