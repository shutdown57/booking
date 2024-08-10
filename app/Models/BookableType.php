<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperBookableType
 */
class BookableType extends Model
{
    use HasFactory;

    /**
      * The attributes that are mass assignable.
      *
      * @var array<string>
      */
    protected $fillable = ['name'];

    /**
    * Get bookable items
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany<Bookable, Bookable>
    */
    public function bookables(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Bookable::class);
    }
}
