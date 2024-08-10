<?php

namespace App\Enums;

use App\Interfaces\HasColor;
use App\Interfaces\HasName;

enum BookableStatus: int implements HasName, HasColor
{
    case Deactive = 0;
    case Active = 1;

    /**
     * Returns the color of the status.
     *
     * The returned color is based on the current status and can be one of:
     * - 'success' when the status is Active
     * - 'danger' when the status is Deactive
     *
     * @return string The color of the status (e.g. 'success', 'danger', etc.)
     */
    public function color(): string
    {
        return match ($this) {
            BookableStatus::Active => 'success',
            BookableStatus::Deactive => 'danger'
        };
    }

    /**
    * Get bookable status name
    */
    public function name(): string
    {
        return match ($this) {
            BookableStatus::Active => 'Active',
            BookableStatus::Deactive => 'Deactive'
        };
    }
}
