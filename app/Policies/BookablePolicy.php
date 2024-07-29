<?php

namespace App\Policies;

use App\Enums\UserPermission;
use App\Models\Bookable;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookablePolicy
{
    use HandlesAuthorization;

    /**
    * User with role admin can view any bookable item,
    * or any user can view own bookable item
    */
    public function view(?User $user, Bookable $bookable): bool|null
    {
        if ($user->can(UserPermission::BookingShow->value)) {
            return true;
        }
        return $user?->id === $bookable->user_id
            && $user->can(UserPermission::BookingOwnShow->value);
    }

    /**
    * User with role admin can view any bookable items,
    * or any user can view own bookable items
    */
    public function viewAny(?User $user): bool|null
    {
        if ($user->can(UserPermission::BookingIndex->value)) {
            return true;
        }
        return $user?->bookables()->count() > 0
            && $user->can(UserPermission::BookingOwnIndex->value);
    }

    /**
    * User with permission can create bookable item
    */
    public function create(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookingCreate->value);
    }

    /**
    * User with role admin can edit any bookable item,
    * or any user can edit own bookable item
    */
    public function edit(?User $user, Bookable $bookable): bool|null
    {
        if ($user->can(UserPermission::BookingEdit->value)) {
            return true;
        }
        return $user?->id === $bookable->user_id
            && $user?->can(UserPermission::BookingOwnEdit->value);
    }

    /**
    * User with permission can delete snooker table item
    */
    public function delete(?User $user): bool|null
    {
        return $user?->can(UserPermission::BookingDelete->value);
    }
}
