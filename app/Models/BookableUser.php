<?php

namespace App\Models;

use App\Enums\BookableUserStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * @mixin IdeHelperBookableUser
 */
class BookableUser extends Pivot
{
    use HasFactory;

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'status' => BookableUserStatus::class,
        ];
    }

    /**
    * Get user
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, BookableUser>
    */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
    * Get bookable items
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<Bookable, BookableUser>
    */
    public function bookable(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Bookable::class, 'bookable_id');
    }
}
