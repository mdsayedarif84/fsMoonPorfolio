<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\About;

class AboutController extends Controller{
    public function index(){
        $categories   =   Category::where('status',1)->get();
        return view('admin.about.addAbout',['categories' => $categories,]);
    }
    protected function validationAbout($request){
        $this->validate($request,
            [
                'title' => 'required|unique:abouts|regex:/^[a-zA-ZÑñ\s]+$/',
                'category_id' => 'required',
                'about_us' => 'required',
                'short_msg' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'You have to choose Title name!',
                'title.regex' => 'Letter & Space only Accepted!',
                'category_id.required' => 'Select Category name!',
                'about_us.required' => 'Write About Myself!',
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
        return $about;
        $about->save();
        return redirect('/about')->with('message', 'Category Save Successfully ');;
    }
    
}
