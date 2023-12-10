<?php

namespace App\Http\Controllers;

use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       return AttributeValue::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'product_id' => ['required','uuid','exists:product,id'],
            'product_category_id' => ['required','int','exists:product_category,id'],
            'attribute_id' => ['required','int','exists:attributes,id'],
            'value' => ['required','string']
        ]);
       $result = AttributeValue::create($attributes);

       return response($result,200);
    }

    /**
     * Display the specified resource.
     */
    public function show(AttributeValue $attributeValue)
    {
        return response($attributeValue,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttributeValue $attributeValue)
    {
       $attributes = $request->validate([
            //'product_id' => ['required','uuid','exists:product,id'],
            //'product_category_id' => ['required','int','exists:product_category,id'],
            //'attribute_id' => ['required','int','exists:attributes,id'],
            'value' => ['required','string']
        ]);
         $attributeValue->update($attributes);

        return response($attributeValue,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttributeValue $attributeValue)
    {
       $attributeValue->delete();

       return response(['message' => 'deleted'],200);
    }
}
