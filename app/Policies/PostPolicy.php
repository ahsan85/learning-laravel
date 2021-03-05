<?php

namespace App\Policies;

use App\Post;
use App\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user;
    }

    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user, Post $post)
    {
        $roles = $user->roles->where('name', 'Admin')->first();

        return  $user->id === $post->user_id || $roles ? Response::allow() : Response::deny("You are not authorized to  view this post");
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return  $user;
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user, Post $post)
    {
        $roles = $user->roles->where('name', 'Admin')->first();

        return  $user->id === $post->user_id || $roles ? Response::allow() : Response::deny("You are not authorized to  edit this post");
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user, Post $post)
    {
        $roles = $user->roles->where('name', 'Admin')->first();

        return  $user->id === $post->user_id || $roles ? Response::allow() : Response::deny("You are not authorized to  delete this post");
    }

    /**
     * Determine whether the user can restore the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function restore(User $user, Post $post)
    {
        $roles = $user->roles->where('name', 'Admin')->first();

        return  $user->id === $post->user_id || $roles ? Response::allow() : Response::deny("You are not authorized to  restore this post");
    }

    /**
     * Determine whether the user can permanently delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function forceDelete(User $user, Post $post)
    {
        $roles = $user->roles->where('name', 'Admin')->first();

        return  $user->id === $post->user_id || $roles;
    }
}
