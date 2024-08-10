<?php

namespace App\Policies;

use App\Enums\UserPermission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookablePolicy
{
    use HandlesAuthorization;

    /**
    * Anyone can view a bookable item
    */
    public function view(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableCreate->value) ? true : null;
    }

    /**
    * Anyone can view bookable item list
    */
    public function viewAny(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableCreate->value) ? true : null;
    }

    /**
    * User with permission can create bookable item
    */
    public function create(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableCreate->value) ? true : null;
    }

    /**
    * User with permission can edit any bookable item
    */
    public function edit(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableEdit->value) ? true : null;
    }

    /**
    * User with permission can delete any bookable item
    */
    public function delete(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableDelete->value) ? true : null;
    }
}
