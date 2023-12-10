<?php

namespace App\Http\Controllers;

use App\Http\Resources\Review\ReviewResource;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index()
    {
      $review = Review::with('review_owner','review_comments.comment_owner.children_comments')->get();
      return ReviewResource::collection($review);

    }

    public function store(Request $request)
    {
       $attributes = $request->validate([
            'user_id' => ['required','uuid','exists:users,id'],
            'product_id' => ['required','uuid','exists:product,id'],
            'commentary' => ['required','string'],
            'rating' => ['required','int'],
        ]);
       $review =  Review::create($attributes);

        return response($review,201);
    }

    public function show(Review $review)
    {
        return response($review,200);
    }

    public function update(Request $request, Review $review)
    {
        $attributes = $request->validate([
            'commentary' => ['required','string'],
            'rating' => ['required','int'],
        ]);

        if ($request->user()->can('update',$review)) {
            $review->update($attributes);
            return response($review, 200);
        }else {
            return response(['message' => 'action not allowed'],403);
        }
    }
    public function destroy(Request $request,Review $review)
    {
        if ($request->user()->can('delete',$review)){
        $review->delete();
        return response(['message' => 'deleted'],200);
            }else{
            return response(['message' => 'action not allowed'],403);
        }
    }
}
