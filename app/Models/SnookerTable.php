<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SnookerTable extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'per_hour_rate', 'image'];
}
