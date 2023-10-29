<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();

        return view('admin.service.addService', ['categories' => $categories]);
    }

    protected function validationAbout($request)
    {
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
                'status.required' => 'You have to choose type status!',
            ]
        );
    }

    public function store(Request $request)
    {
        $this->validationAbout($request);
        $about = new Service();
        $about->q_heading = $request->q_heading;
        $about->category_id = $request->category_id;
        $about->heading_name = $request->heading_name;
        $about->short_msg = $request->short_msg;
        $about->status = $request->status;
        $about->save();

        return redirect('/about')->with('message', 'Service Data Save Successfully ');
    }
}
