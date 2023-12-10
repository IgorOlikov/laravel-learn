<?php

namespace App\Http\Resources\Product;

use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ReviewComments\ReviewCommentsResource;
use App\Http\Resources\Review\ReviewCollection;
use App\Http\Resources\Review\ReviewResource;
use App\Http\Resources\User\UserResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{


    /**
     * Transform the resource  into an array.
     *  Class Product
     *
     *
     * @param Request $request
     * @return array ;
     */

    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
       // return dd($request);


       return [

           'id' => $this->id,
           'name' => $this->name,
           'price' => $this->price,
           'image' => $this->image,
           'about' => $this->about,
           'description' => ['text' => $this->description->text],

           $this->mergeWhen((Auth::hasUser())  && ((integer)Auth::user()->user_role_id !== 3), [
           'category_id' => $this->category_id ,
           'product_category_id'  => $this->product_category_id,
           'published'  => $this->published,
            ]),

           'Technical data' => $this->technical_data,
           'reviews' => ReviewResource::collection($this->whenLoaded('reviews')),



       ];

    }
}
