<?php

namespace App\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;

class UserPolicy
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
     * @param User $user
     * @param User $post
     *
     * @return bool
     */
    public function before($user, $post)
    {
        return false;
    }

    /**
     * Determine if the given post can be updated by the user.
     *
     * @param  User  $user
     * @param  User  $post
     * @return bool
     */
    public function update(User $user, User $post)
    {
        return $user->id === $post->id;
    }
}
