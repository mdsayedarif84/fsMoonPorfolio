<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use DB;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $categories = Category::where('status', 1)->get();

        return view('admin.about.addAbout', ['categories' => $categories]);
    }

    protected function validationAbout($request)
    {
        $this->validate($request,
            [
                'title' => 'required|unique:abouts|regex:/^[a-zA-Z\s?]*$/',
                'category_id' => 'required',
                'about_us' => 'required',
                'short_msg' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'You have to choose Title name!',
                'title.regex' => 'Letter, Question Mark & Space only Accepted!',
                'category_id.required' => 'Select Category name!',
                'about_us.required' => 'Write About Myself!',
                'short_msg.required' => 'Write something You Know!',
                'status.required' => 'You have to choose type status!',
            ]
        );
    }

    public function saveAboutInfo(Request $request)
    {
        $this->validationAbout($request);
        $about = new About();
        $about->title = $request->title;
        $about->category_id = $request->category_id;
        $about->about_us = $request->about_us;
        $about->short_msg = $request->short_msg;
        $about->status = $request->status;
        $about->save();

        return redirect('/about')->with('message', 'About Save Successfully ');
    }

    public function manageAbout()
    {
        // $abouts = About::all();
        $abouts = DB::table('abouts')
                        ->join('categories', 'abouts.category_id', '=', 'categories.id')
                        ->select('abouts.*', 'categories.category_name')
                        ->get();
        // return $abouts;
        return view('admin.about.manageAbout', ['abouts' => $abouts]);
    }

    public function inactiveAbout($id)
    {
        $about = About::find($id);
        $about->status = 0;
        $about->save();

        return redirect('manage/about')->with('message', 'About info inactive successfully');
    }

    public function activeAbout($id)
    {
        $about = About::find($id);
        $about->status = 1;
        $about->save();

        return redirect('manage/about')->with('message', 'About info active successfully');
    }

    public function editAbout($id)
    {
        $about = About::find($id);
        $categories = Category::where('status', 1)->get();

        return view('admin.about.editAbout', [
            'about' => $about,
            'categories' => $categories,
        ]);
    }

    public function updateAbout(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required|regex:/^[a-zA-Z\s?]*$/',
                'category_id' => 'required',
                'about_us' => 'required',
                'short_msg' => 'required',
                'status' => 'required',
            ],
            [
                'title.required' => 'You have to choose Title name!',
                'title.regex' => 'Letter, Question Mark & Space only Accepted!',
                'category_id.required' => 'Select Category name!',
                'about_us.required' => 'Write About Myself!',
                'short_msg.required' => 'Write something You Know!',
                'status.required' => 'You have to choose type status!',
            ]
        );
        $aboutById = About::find($request->about_id);
        $aboutById->title = $request->title;
        $aboutById->category_id = $request->category_id;
        $aboutById->about_us = $request->about_us;
        $aboutById->short_msg = $request->short_msg;
        $aboutById->status = $request->status;
        $aboutById->save();

        return redirect('/manage/about')->with('message', 'About update Successfully ');
    }

    public function deleteCategory($id)
    {
        $about = About::find($id);

        return $about;
        $about->delete();

        return redirect('manage/about')->with('message', 'About Info Delete Successfully');
    }
}
