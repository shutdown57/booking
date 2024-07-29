<?php

namespace App\Policies;

use App\Enums\UserPermission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SnookerTablePolicy
{
    use HandlesAuthorization;

    /**
    * Anyone can view snooker table item
    */
    public function view(): bool|null
    {
        return true;
    }

    /**
    * Anyone can view snooker table item list
    */
    public function viewAny(): bool|null
    {
        return true;
    }

    /**
    * User with permission can create snooker table item
    */
    public function create(?User $user): bool|null
    {
        return $user?->can(UserPermission::SnookerTableCreate->value);
    }

    /**
    * User with permission can edit snooker table item
    */
    public function edit(?User $user): bool|null
    {
        return $user?->can(UserPermission::SnookerTableEdit->value);
    }

    /**
    * User with permission can delete snooker table item
    */
    public function delete(?User $user): bool|null
    {
        return $user?->can(UserPermission::SnookerTableDelete->value);
    }
}
