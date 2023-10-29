<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class EducationController extends Controller
{
    public function index()
    {
        return view('admin.education.addEducation');
    }
}
