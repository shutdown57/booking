<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property int $per_hour_rate
 * @property string|null $image
 * @property string $name
 * @property \App\Enums\BookableStatus $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property int|null $bookable_type_id
 * @property-read \App\Models\BookableType|null $type
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\BookableUser $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereBookableTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable wherePerHourRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bookable whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperBookable {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bookable> $bookables
 * @property-read int|null $bookables_count
 * @method static \Illuminate\Database\Eloquent\Builder|BookableType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookableType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookableType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookableType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperBookableType {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string|null $book_in
 * @property string|null $book_out
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property int|null $bookable_id
 * @property-read \App\Models\Bookable|null $bookable
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser whereBookIn($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser whereBookOut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser whereBookableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BookableUser whereUserId($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperBookableUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Bookable> $bookables
 * @property-read int|null $bookables_count
 * @property-read \App\Models\BookableUser $pivot
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $booked
 * @property-read int|null $booked_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

