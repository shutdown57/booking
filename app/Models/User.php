<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

/**
 * @mixin IdeHelperUser
 */
class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
    * Get booked items
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany<User, Bookable>
    */
    public function books(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Bookable::class)
            ->using(BookableUser::class)
            ->withPivot('book_in', 'book_out', 'status')
            ->withTimestamps();
    }

    /**
    * Get bookables items
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Bookable, User>
    */
    public function bookables(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Bookable::class, 'user_id');
    }
}
