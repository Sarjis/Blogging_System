<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private function validation($request)
    {
        $this->validate($request, [
            'category_name' => 'required|max:255|min:4'
        ]);
    }

    function index(Request $request)
    {
        $this->validation($request);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();
        //return 'Saved';
    }

    function getAllCategory()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        return response()->json([
            'categories' => $categories
        ], 200);
    }

    function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        //return 'Deleted';
    }

    function fetchCategory($id)
    {
        $category = Category::find($id);
        return response()->json([
            'category' => $category
        ], 200);
    }

    function updateCategory(Request $request){
        $this->validation($request);

        $category = Category::find($request->id);
        $category->category_name = $request->category_name;
        $category->update();
        //return 'success';
    }
}
