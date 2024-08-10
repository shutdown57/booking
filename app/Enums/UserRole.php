<?php

namespace App\Enums;

use App\Interfaces\HasName;

enum UserRole: string implements HasName
{
    case Client = 'client';
    case Admin = 'admin';

    /**
    * Get user role name
    */
    public function name(): string
    {
        return match ($this) {
            static::Client => 'Client',
            static::Admin => 'Admin',
        };
    }
}
