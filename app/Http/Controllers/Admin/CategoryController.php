<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.addCategory');
    }

    protected function validationCategory($request)
    {
        $this->validate($request,
            [
                'category_name' => 'required|unique:categories|regex:/^[a-zA-ZÑñ\s]+$/',
                'status' => 'required',
            ],
            [
                'category_name.required' => 'You have to choose category name!',
                'category_name.regex' => 'Letter & Space only Accepted!',
                'status.required' => 'You have to choose type status!',
            ]
        );
    }

    public function saveCategoryInfo(Request $request)
    {
        $this->validationCategory($request);
        $category = new Category();
        $category->category_name = trim($request->category_name);
        $category->status = $request->status;
        $category->save();

        return redirect('/category')->with('message', 'Category Save Successfully ');
    }

    public function manageCategoryInfo()
    {
        $categories = Category::all();
        // return $categories;
        return view('admin.category.manage-category', ['categories' => $categories]);
    }

    public function inactive($id)
    {
        $category = Category::find($id);
        $category->status = 0;
        $category->save();

        return redirect('manage/category')->with('message', 'Category info inactive successfully');
    }

    public function active($id)
    {
        $category = Category::find($id);
        $category->status = 1;
        $category->save();

        return redirect('manage/category')->with('message', 'Category info active successfully');
    }

    public function editCategory($id)
    {
        $category = Category::find($id);

        return view('admin.category.editCategory', ['category' => $category]);
    }

    public function updateCategory(Request $request)
    {
        $this->validate($request,
            [
                'category_name' => 'required|regex:/^[a-zA-ZÑñ\s]+$/',
                'status' => 'required',
            ],
            [
                'category_name.required' => 'You have to choose category name!',
                'category_name.regex' => 'Letter & Space only Accepted!',
                'status.required' => 'You have to choose type status!',
            ]
        );
        $categoryById = Category::find($request->cat_id);
        $categoryById->category_name = $request->category_name;
        $categoryById->status = $request->status;
        $categoryById->save();

        return redirect('manage/category')->with('message', 'Category Info Update Successfully');
    }

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('manage/category')->with('message', 'Category Info Delete Successfully');
    }
}
