<?php

namespace App\Policies;

use App\Enums\UserPermission;
use App\Models\BookableUser;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookableUserPolicy
{
    use HandlesAuthorization;

    /**
     * Check if a user has permission to view a bookable user.
     *
     * @param  ?User  $user     The user attempting to view the bookable user.
     * @param  BookableUser  $bookableUser The bookable user being viewed.
     *
     * @return bool|null True if the user has admin permissions
     *                   or is the client and owner of the bookable user,
     *                   false otherwise. Null if the user does not have client role.
     */
    public function view(?User $user, BookableUser $bookableUser): bool|null
    {
        if (in_array('admin', $user->roles()->pluck('name')->toArray())) {
            return true;
        }
        if (!in_array('client', $user?->roles()->pluck('name')->toArray())) {
            return null;
        }
        return $user?->id === $bookableUser->user_id;
    }

    /**
     * Determine if a user can view any bookable user.
     *
     * @param  \App\Models\User|null  $user
     * @return bool|null
     */
    public function viewAny(?User $user): bool|null
    {
        if (!is_null($user) && in_array('admin', $user?->roles()->pluck('name')->toArray())) {
            return true;
        }
        if (is_null($user) || !in_array('client', $user?->roles()->pluck('name')->toArray())) {
            return null;
        }
        return $user?->can(UserPermission::BookableUserIndex->value) ? true : null;
    }

    /**
     * Determine if a new user can be created.
     *
     * @param User|null $user The user instance to check permissions for,
     *                        or null if global permission should be checked.
     * @return bool|null True if the user has permission to create a new user,
     *                   false otherwise. Returns null if no user is provided
     *                   and global permission cannot be determined.
     */
    public function create(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableUserCreate->value) ? true : null;
    }

    /**
     * Determine if a user can edit a bookable user.
     *
     * @param User|null $user The user to check. If null, the current user will be used.
     * @param BookableUser $bookableUser The bookable user to edit.
     *
     * @return bool|null true if the user has admin
     *                   or client role and is editing their own bookable user,
     *                   false otherwise (null means the request should not be processed)
     */
    public function edit(?User $user, BookableUser $bookableUser): bool|null
    {
        if (!is_null($user) && in_array('admin', $user?->roles()->pluck('name')->toArray())) {
            return true;
        }
        if (is_null($user) || !in_array('client', $user?->roles()->pluck('name')->toArray())) {
            return null;
        }
        $condition = [
            ['id', '=', $bookableUser->id],
            ['book_out', '>=', now()],
        ];
        return BookableUser::query()->where($condition)->exists()
            && $user?->can(UserPermission::BookableUserEdit->value)
            && $user?->id === $bookableUser->user_id;
    }

    /**
     * Deletes a user from a bookable user.
     *
     * @param User|null $user The user to delete. If null, will default to not deleting.
     * @param BookableUser $bookableUser The bookable user whose user is being deleted.
     *
     * @return bool|null True if the user has admin
     *                   or client role and is deleting their own bookable user,
     *                   false otherwise (null means the request should not be processed)
     */
    public function delete(?User $user, BookableUser $bookableUser): bool|null
    {
        if (!is_null($user) && in_array('admin', $user?->roles()->pluck('name')->toArray())) {
            return true;
        }
        if (is_null($user) || !in_array('client', $user?->roles()->pluck('name')->toArray())) {
            return null;
        }
        $condition = [
            ['id', '=', $bookableUser->id],
            ['book_out', '>=', now()],
        ];
        return BookableUser::query()->where($condition)->exists()
            && $user?->can(UserPermission::BookableUserDelete->value)
            && $user?->id === $bookableUser->user_id;
    }
}
