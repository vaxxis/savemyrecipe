<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Recipe;
use App\User;

class RecipePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the given recipe can be edited by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return bool
     */
    public function edit(User $user, $recipe)
    {
        return $user->id === $recipe->user_id;
    }

    /**
     * Determine if the given recipe can be updated by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return bool
     */
    public function update(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id;
    }

    /**
     * Determine if the given recipe can be deleted by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return bool
     */
    public function destroy(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id;
    }

    /**
     * Determine if the given recipe can be deleted by the user.
     *
     * @param  \App\User  $user
     * @param  \App\Recipe  $recipe
     * @return bool
     */
    public function deletePhoto(User $user, Recipe $recipe)
    {
        return $user->id === $recipe->user_id;
    }
}
