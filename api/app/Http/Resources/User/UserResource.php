<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class UserResource extends JsonResource
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
                'name' => $this->name,
                'image' => $this->image,

            $this->mergeWhen((Auth::hasUser())  && ((integer)Auth::user()->user_role_id !== 3), [
                'phone_number' => $this->phone_number,
                'email' =>  $this->email,
                'user_role_id' =>  $this->user_role_id,
                'email_verified_at' => $this->email_verified_at,
                'created_at' => $this->created_at,
                'updated_at' =>  $this->updated_at,
                ]),
        ];

    }
}
