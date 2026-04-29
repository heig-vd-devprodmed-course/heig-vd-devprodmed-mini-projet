<?php

namespace App\Policies;

use App\Models\Painting;
use App\Models\User;

class PaintingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(?User $user, Painting $painting): bool
    {
        return true;
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
    public function update(User $user, Painting $painting): bool
    {
        return $user->id === $painting->user_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Painting $painting): bool
    {
        return $user->id === $painting->user_id || $user->is_admin;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Painting $painting): bool
    {
        return $user->id === $painting->user_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Painting $painting): bool
    {
        return $user->id === $painting->user_id;
    }
}
