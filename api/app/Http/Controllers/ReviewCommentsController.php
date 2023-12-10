<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewComments\ReviewCommentsResource;
use App\Models\ReviewComments;
use Illuminate\Http\Request;

class ReviewCommentsController extends Controller
{

    public function index()
    {
       //$comments = ReviewComments::with('comment_owner','children_comments')->get();

        $comments = ReviewComments::with('comment_owner','children_comments.comment_owner')->get();

        //return response($comments);
        return   ReviewCommentsResource::collection($comments);
    }

    public function store(Request $request)
    {
         $attributes = $request->validate([
            'comment' => ['required','string'],
             'review_id' => ['required','uuid','exists:review,id'],
             'user_id' => ['required','uuid','exists:users,id'],

        ]);
       $comment  = ReviewComments::create($attributes);

        return response($comment,201);
    }

    public function show(ReviewComments $comment)
    {
        return $comment;
    }

    public function update(Request $request, ReviewComments $comment)
    {
           $attributes = $request->validate([
               'comment' => ['required','string'],
            ]);
        if ($request->user()->can('update',$comment)) {
            $comment->update($attributes);
            return response($comment,200);
        }else{
            return response(['message' => 'action not allowed'],403);
        }
    }
    public function destroy(Request $request,ReviewComments $comment)
    {
        if ($request->user()->can('delete',$comment)) {
            $comment->delete();
            return response(['message' => 'deleted'], 200);
        }else{
            return response(['message' => 'action not allowed'],403);
        }
    }
}
