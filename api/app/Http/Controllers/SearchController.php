<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {

        $response = Product::where('name','LIKE','%'.$request->name.'%')->get();

        return response($response);
    }
}
