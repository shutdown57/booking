<?php

namespace App\Enums;

use App\Interfaces\HasColor;
use App\Interfaces\HasName;

enum BookableUserStatus: int implements HasName, HasColor
{
    case Pending = 0;
    case Confirm = 1;
    case Cancel = 2;

    /**
     * Returns the color of the status.
     *
     * The returned color is based on the current status and can be one of:
     * - 'success' when the status is Confirm
     * - 'danger' when the status is Cancel
     * - 'warning' when the status is Pending
     *
     * @return string The color of the status (e.g. 'success', 'danger', etc.)
     */
    public function color(): string
    {
        return match ($this) {
            static::Confirm => 'success',
            static::Cancel => 'danger',
            static::Pending => 'warning',
        };
    }

    /**
    * Get bookable user (booking) status name
    */
    public function name(): string
    {
        return match ($this) {
            static::Confirm => 'Confirm',
            static::Cancel => 'Cancel',
            static::Pending => 'Pending',
        };
    }
}
