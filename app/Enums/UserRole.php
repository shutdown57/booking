<?php

namespace App\Enums;

enum UserRole: string
{
    case Client = 'client';
    case Admin = 'admin';

    /**
    * Get user role label
    */
    public function label(): string
    {
        return match ($this) {
            static::Client => 'Client',
            static::Admin => 'Admin',
        };
    }
}
