<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductCategory;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $categories->load('product_category');

        return response($categories,200);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Home $home)
    {
        //
    }

    public function update(Request $request, Home $home)
    {
        //
    }
    public function destroy(Home $home)
    {
        //
    }
}
