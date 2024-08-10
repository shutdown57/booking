<?php

use App\Enums\UserPermission;
use App\Interfaces\HasName;

describe(
    'UserPermission enum',
    function () {
        test(
            'has exact 2 cases',
            function () {
                expect(count(UserPermission::cases()))
                    ->toBe(3 * 5);
            }
        );

        test(
            'can get value',
            function (UserPermission $permission) {
                expect($permission->value)->toBeString();
            }
        )->with(UserPermission::cases());

        test(
            'is instance of HasName',
            function (UserPermission $permission) {
                expect($permission)->toBeInstanceOf(HasName::class);
            }
        )->with(UserPermission::cases());

        test(
            'can get name',
            function (UserPermission $permission) {
                expect($permission->name())->toBeString();
            }
        )->with(UserPermission::cases());
    }
);
