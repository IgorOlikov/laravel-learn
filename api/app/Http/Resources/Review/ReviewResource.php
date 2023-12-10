<?php

namespace app\Http\Resources\Review;

use App\Http\Resources\ReviewComments\ReviewCommentsResource;
use App\Http\Resources\User\UserCollection;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ReviewResource extends JsonResource
{


    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
       // return parent::toArray($request);
        return [
            'id' => $this->id,
            'commentary' => $this->commentary,
            'rating' => $this->rating,

            $this->mergeWhen((Auth::hasUser())  && ((integer)Auth::user()->user_role_id !== 3), [
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            ]),

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
             'review_owner' => new UserResource($this->whenLoaded('review_owner')),
            'comments' => ReviewCommentsResource::collection($this->whenLoaded('review_comments')),
        ];

    }
}
