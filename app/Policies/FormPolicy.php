<?php

namespace App\Policies;

use App\Enums\FormStatusEnum;
use Illuminate\Auth\Access\Response;
use App\Models\Form;
use App\Models\User;

class FormPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Form $form): bool
    {
        //user role is admin or user is the owner of the form
        if ($user->hasRole('Admin') || $user->id === $form->user_id)
            return true;

        return false;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Form $form): bool
    {
        if ($user->hasRole('Admin') || $user->id === $form->user_id)
            return true;

        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Form $form): bool
    {
        #user has role admin or user is the owner of the form and the form status is pending
        if ($user->hasRole('Admin') || ($user->id === $form->user_id && $form->status === FormStatusEnum::PENDING)) {
            return true;
        }

        return false;
    }

    public function deleteAny(User $user): bool
    {
        // Only admin can delete any form
        return $user->hasRole('Admin');
    }



    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Form $form): bool
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Form $form): bool
    {
        return false;
    }
}
