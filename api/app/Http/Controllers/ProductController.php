<?php

namespace App\Http\Controllers;


use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Models\AttributeValue;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return response($products,200);
    }
    public function store(Request $request)
    {
           $attributes = $request->validate([
                'category_id' => ['required','integer'],
                'product_category_id' => ['required','integer'],
                'name'=> ['required','string','unique:product'],
                'price' => ['required','numeric'],
                'about' => ['required','string'],
            ]);
        $product  =  Product::create($attributes);

        return response($product,201);
    }

    public function show(Product $product)
    {
        $product = Product::with('reviews.review_owner')->first();

        //attributes + values
       $values = $product->attributes_values()->pluck('value');
        $product['technical_data'] = $product->attributes()->pluck('name')->combine($values);

         return new ProductResource($product);
    }

    public function update(Request $request, Product $product)
    {
        $attributes = $request->validate([
            'category_id' => ['required','integer'],
            'product_category_id' => ['required','integer'],
            'name'=> ['required','string','unique:product'],
            'price' => ['required','numeric'],
            'about' => ['required','string'],
            'published' => ['bool'],
        ]);
        $product->update($attributes);

        return response($product,200);
    }
    public function destroy(Product $product)
    {
        $product->delete();

        return response('product deleted',200);
    }
}
