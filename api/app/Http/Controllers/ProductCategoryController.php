<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $product_categories = ProductCategory::all();

        return response($product_categories,200);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => ['required','string'],
            'category_id' => ['required','int','exists:category,id']
            ]);
       $product_category = ProductCategory::create($attributes);

       return response($product_category,201);
    }

    public function show(ProductCategory $product_category)
    {
        return response($product_category,200);
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $attributes = $request->validate([
            'name' => ['required','string'],
            'category_id' => ['required','int','exists:category,id']
        ]);
        $productCategory->update($attributes);
        return response($productCategory,200);
    }
    public function destroy(ProductCategory $productCategory)
    {
        $productCategory->delete();
        return response(['message' => 'deleted'],200);
    }
}
