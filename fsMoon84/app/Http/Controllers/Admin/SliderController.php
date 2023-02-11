<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Intervention\Image\Facades\Image;



class SliderController extends Controller{

    protected function addSliderValidation($request){
        $this->validate($request, [
            'heading'       => 'required|min:3|max:50',
            'link'          => 'required',
            'status'        => 'required',
            'link_name'     => 'required',
            'description'   => 'required',
            'image'         => 'required',
            ],
            [
                'heading.required' => 'Heading must be needed!',
                'link.required' => 'Please set the link!',
                'status.required' => 'Please select the status!',
                'description.required' => 'Please write something'
            ]
        );
    }
    public function index(){
        return view('admin.slider.add-slider');
    }
    protected function sliderImageUlolad($request){
        $slidserImage   =   $request->file('image');
        $extension  =   $slidserImage->getClientOriginalExtension();
        $imageName= $request->link_name.'.'.$extension;
        $path   ='sliderImage/';
        $imageUrl=  $path.$imageName;
        Image::make($slidserImage)->resize(1300,910)->save($imageUrl);
        return $imageUrl;

    }
    protected function saveSlideData($request,$imageUrl){
        $slider    =   new Slider();
        $slider->heading   =   $request->heading;
        $slider->link   =   $request->link;
        $slider->status   =   $request->status;
        $slider->link_name   =   $request->link_name;
        $slider->description   =   $request->description;
        $slider->image   =   $imageUrl;
        $slider->save();
    }
    public function saveSlider(Request $request){
        $this->addSliderValidation($request);
        $imageUrl   =   $this->sliderImageUlolad($request);
        $this->saveSlideData($request,$imageUrl);
        return redirect('/slider')->with('message', 'Slider Info Save Successfully');
    }
    public function manageSlider(){
        $sliders    =   Slider::all();
        return view('admin.slider.manage-slider',['sliders'=>$sliders]);
    }
}
