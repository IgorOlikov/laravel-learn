<?php

namespace App\Http\Controllers;

use App\Models\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{

    public function index()
    {
          $descriptions = Description::all();

          return response($descriptions,200);
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'product_id' => ['uuid','exists:product,id','unique:description,product_id'],
            'text' => ['required','string'],
        ]);
        $description = Description::create($attributes);

        return response($description,201);
    }

    public function show(Description $description)
    {
       return response($description,200);
    }

    public function update(Request $request, Description $description)
    {
       $attributes = $request->validate(['text' => ['required','string'],]);
       $description->update($attributes);

       return response($description);
    }

    public function destroy(Description $description)
    {
        $description->delete();
        return response(['message' => 'deleted'],200);
    }
}
