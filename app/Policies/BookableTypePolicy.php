<?php

namespace App\Policies;

use App\Enums\UserPermission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookableTypePolicy
{
    use HandlesAuthorization;

    /**
    * Anyone can view bookable type item
    */
    public function view(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableTypeCreate->value) ? true : null;
    }

    /**
    * Anyone can view bookable type item list
    */
    public function viewAny(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableTypeCreate->value) ? true : null;
    }

    /**
    * User with permission can create bookable type item
    */
    public function create(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableTypeCreate->value) ? true : null;
    }

    /**
    * User with permission can edit any bookable type item
    */
    public function edit(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableTypeEdit->value) ? true : null;
    }

    /**
    * User with permission can delete any bookable type item
    */
    public function delete(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookableTypeDelete->value) ? true : null;
    }
}
