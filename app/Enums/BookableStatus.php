<?php

namespace App\Enums;

enum BookableStatus
{
    case Confirm;
    case Cancel;

    public function color(): string
    {
        return match ($this) {
            BookableStatus::Confirm => 'success',
            BookableStatus::Cancel => 'error'
        };
    }

    public function name(): string
    {
        return match ($this) {
            BookableStatus::Confirm => 'Confirm',
            BookableStatus::Cancel => 'Cancel'
        };
    }
}
