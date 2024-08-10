<?php

namespace App\Enums;

use App\Interfaces\HasName;

enum UserPermission: string implements HasName
{
    case BookableTypeIndex = 'bookable.type.index';
    case BookableTypeShow = 'bookable.type.show';
    case BookableTypeCreate = 'bookable.type.create';
    case BookableTypeEdit = 'bookable.type.edit';
    case BookableTypeDelete = 'bookable.type.delete';

    case BookableIndex = 'bookable.index';
    case BookableShow = 'bookable.show';
    case BookableCreate = 'bookable.create';
    case BookableEdit = 'bookable.edit';
    case BookableDelete = 'bookable.delete';

    case BookableUserIndex = 'bookable.user.index';
    case BookableUserShow = 'bookable.user.show';
    case BookableUserCreate = 'bookable.user.create';
    case BookableUserEdit = 'bookable.user.edit';
    case BookableUserDelete = 'bookable.user.delete';

    /**
    * Get user permission name
    */
    public function name(): string
    {
        return match ($this) {
            static::BookableTypeIndex => 'Bookable Type Index',
            static::BookableTypeShow => 'Bookable Type Show',
            static::BookableTypeCreate => 'Bookable Type Create',
            static::BookableTypeEdit => 'Bookable Type Edit',
            static::BookableTypeDelete => 'Bookable Type Delete',

            static::BookableIndex => 'Bookable Index',
            static::BookableShow => 'Bookable Show',
            static::BookableCreate => 'Bookable Create',
            static::BookableEdit => 'Bookable Edit',
            static::BookableDelete => 'Bookable Delete',

            static::BookableUserIndex => 'Bookable User Index',
            static::BookableUserShow => 'Bookable User Show',
            static::BookableUserCreate => 'Bookable User Create',
            static::BookableUserEdit => 'Bookable User Edit',
            static::BookableUserDelete => 'Bookable User Delete',
        };
    }
}
