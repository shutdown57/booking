<?php

namespace App\Policies;

use App\Enums\UserPermission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TennisCourtPolicy
{
    use HandlesAuthorization;

    /**
    * Anyone can view tennis court item
    */
    public function view(): bool|null
    {
        return true;
    }

    /**
    * Anyone can view tennis court item list
    */
    public function viewAny(): bool|null
    {
        return true;
    }

    /**
    * User with permission can create tennis court item
    */
    public function create(?User $user): bool|null
    {
        return $user?->can(UserPermission::TennisCourtCreate->value);
    }

    /**
    * User with permission can edit tennis court item
    */
    public function edit(?User $user): bool|null
    {
        return $user?->can(UserPermission::TennisCourtEdit->value);
    }

    /**
    * User with permission can delete tennis court item
    */
    public function delete(?User $user): bool|null
    {
        return $user?->can(UserPermission::TennisCourtDelete->value);
    }
}
