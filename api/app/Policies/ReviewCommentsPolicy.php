<?php

namespace App\Policies;

use App\Models\ReviewComments;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ReviewCommentsPolicy
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
    public function view(User $user, ReviewComments $reviewComments): bool
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

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ReviewComments $comment): bool
    {
        if( (($user->id === $comment->user_id) && ($user->tokenCan('role:user')))
            OR
            ($user->tokenCan('role:redactor') || $user->tokenCan('*'))){
            return true;
        }else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ReviewComments $comment): bool
    {
        if( (($user->id === $comment->user_id) && ($user->tokenCan('role:user')))
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
    public function restore(User $user, ReviewComments $comment): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ReviewComments $reviewComments): bool
    {
        //
    }
}
