<?php

namespace App\Models;

use App\Enums\BookableStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperBookable
 */
class Bookable extends Model
{
    use HasFactory;

    /**
      * The attributes that are mass assignable.
      *
      * @var array<string>
      */
    protected $fillable = [
        'per_hour_rate',
        'image',
        'status',
        'name',
        'bookable_type_id'
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    public function casts(): array
    {
        return [
            'status' => BookableStatus::class,
        ];
    }

    /**
    * Get creator user
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<User, Bookable>
    */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
    * Get booked users
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User, Bookable>
    */
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->using(BookableUser::class)
            ->withPivot('book_in', 'book_out', 'status')
            ->withTimestamps();
    }

    /**
    * Get type of bookable item
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo<BookableType, Bookable>
    */
    public function type(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(BookableType::class, 'bookable_type_id', 'id');
    }
}
