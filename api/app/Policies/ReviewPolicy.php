<?php

namespace App\Policies;

use App\Models\Review;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReviewPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Review $review): bool
    {
        //
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        //
    }

    public function update(User $user, Review $review): bool
    {
        if( (($user->id === $review->user_id) && ($user->tokenCan('role:user')))
            OR
            ($user->tokenCan('role:redactor') || $user->tokenCan('*'))){
            return true;
        }else{
            return false;
        }
    }

    public function delete(User $user, Review $review): bool
    {
        if( (($user->id === $review->user_id) && ($user->tokenCan('role:user')))
            OR
            ($user->tokenCan('role:redactor') || $user->tokenCan('*'))){
            return true;
        }else{
            return false;
        }
    }


    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Review $review): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Review $review): bool
    {
        //
    }
}
