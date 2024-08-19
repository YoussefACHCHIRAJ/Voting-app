<?php

namespace App\Policies;

use App\Models\Exercice;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ExercicePolicy
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
    public function view(User $user, Exercice $exercice): bool
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
    public function update(User $user, Exercice $exercice): bool
    {
        return $user->id === (int) $exercice->user_id && now()->subHour() <= $exercice->created_at;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Exercice $exercice): bool
    {
        return $user->id === (int) $exercice->user_id || $user->isAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Exercice $exercice): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Exercice $exercice): bool
    {
        //
    }
}
