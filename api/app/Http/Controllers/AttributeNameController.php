<?php

namespace App\Http\Controllers;

use App\Models\AttributeName;
use Illuminate\Http\Request;

class AttributeNameController extends Controller
{
    public function index()
    {
       return  AttributeName::all();
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'product_category_id' => ['required','int','exists:product_category,id'],
            'name' => ['required','string'],
        ]);

         $result = AttributeName::create($attributes);
            return response($result,200);

    }

    public function show(AttributeName $attributeName)
    {
        return $attributeName;
    }

   public function update(Request $request, AttributeName $attributeName)
    {
        $attributes = $request->validate([
            'name' => ['required','string'],
            ]);
        $attributeName->update($attributes);

        return response($attributeName,200);
    }

    public function destroy(AttributeName $attributeName)
    {
        $attributeName->delete();

        return response(['message' => 'deleted'], 200);
    }
}
