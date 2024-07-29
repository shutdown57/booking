<?php

namespace App\Enums;

enum UserPermission: string
{
    case TennisCourtIndex = 'tennis-court.index';
    case TennisCourtShow = 'tennis-court.show';
    case TennisCourtCreate = 'tennis-court.create';
    case TennisCourtEdit = 'tennis-court.edit';
    case TennisCourtDelete = 'tennis-court.delete';

    case SnookerTableIndex = 'snooker-table.index';
    case SnookerTableShow = 'snooker-table.show';
    case SnookerTableCreate = 'snooker-table.create';
    case SnookerTableEdit = 'snooker-table.edit';
    case SnookerTableDelete = 'snooker-table.delete';

    case BookingIndex = 'booking.index';
    case BookingShow = 'booking.show';
    case BookingCreate = 'booking.create';
    case BookingEdit = 'booking.edit';
    case BookingDelete = 'booking.delete';

    case BookingOwnIndex = 'own.booking.index';
    case BookingOwnShow = 'own.booking.show';
    case BookingOwnCreate = 'own.booking.create';
    case BookingOwnEdit = 'own.booking.edit';

    /**
    * Get user permission label
    */
    public function label(): string
    {
        return match ($this) {
            static::TennisCourtIndex => 'Tennis Court Index',
            static::TennisCourtShow => 'Tennis Court Show',
            static::TennisCourtCreate => 'Tennis Court Create',
            static::TennisCourtEdit => 'Tennis Court Edit',
            static::TennisCourtDelete => 'Tennis Court Delete',

            static::SnookerTableIndex => 'Snooker Table Index',
            static::SnookerTableShow => 'Snooker Table Show',
            static::SnookerTableCreate => 'Snooker Table Create',
            static::SnookerTableEdit => 'Snooker Table Edit',
            static::SnookerTableDelete => 'Snooker Table Delete',

            static::BookingIndex => 'Booking Index',
            static::BookingShow => 'Booking Show',
            static::BookingCreate => 'Booking Create',
            static::BookingEdit => 'Booking Edit',
            static::BookingDelete => 'Booking Delete',

            static::BookingOwnIndex => 'Own Booking Index',
            static::BookingOwnShow => 'Own Booking Show',
            static::BookingOwnCreate => 'Own Booking Create',
            static::BookingOwnEdit => 'Own Booking Edit',
        };
    }
}
