<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;
use Illuminate\Support\Facades\DB;


class FrontendController extends Controller
{
    public function index(){
        $about     =   DB::table('abouts')->select('abouts.*')->first();
        $sliderImages    =   DB::table('sliders')
                            ->select('sliders.*')
                            ->orderBy('id','DESC')
                            ->take(4)
                            ->get();
                            // return $sliderImages;
        return view('frontend.home.body',
        [
            'about'=>$about,
            'sliderImages'=>$sliderImages,
        ]);
    }
}
