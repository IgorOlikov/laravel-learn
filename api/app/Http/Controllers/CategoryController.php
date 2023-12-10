<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();

        return response($categories,200);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required','string','unique:category,name']
        ]);
        $category = Category::create($attributes);
        return response($category,201);
    }

    public function show(Category $category)
    {
        $category->load('product_category');


        return response($category,200);
    }

    public function update(Request $request,Category $category)
    {
        $attributes = $request->validate([
            'name' => ['required','string','unique:category,name']
        ]);
        $category->update($attributes);
        return response($category,200);
    }
    public function delete(Category $category)
    {
        $category->delete();

        return response(['message'=> 'category deleted'],200);
    }

}
