<?php

namespace App\Http\Resources\ReviewComments;

use App\Http\Resources\Review\ReviewResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ReviewCommentsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        return [

            'id' => $this->id,
            'parent_id' => $this->parent_id,
            'comment' => $this->comment,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            $this->mergeWhen((Auth::hasUser())  && ((integer)Auth::user()->user_role_id !== 3), [
              'review_id' => $this->review_id,
              'user_id' => $this->user_id,
            ]),
            'comment_owner' => new UserResource($this->whenLoaded('comment_owner')),
            'children_comments' =>  ReviewCommentsResource::collection($this->whenLoaded('children_comments')),


        ];
    }
}
