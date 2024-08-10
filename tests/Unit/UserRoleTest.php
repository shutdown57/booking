<?php

use App\Enums\UserRole;
use App\Interfaces\HasName;

describe(
    'UserRole enum',
    function () {
        test(
            'has exact 2 cases',
            function () {
                expect(count(UserRole::cases()))->toBe(2);
            }
        );

        test(
            'can get value',
            function (UserRole $role) {
                expect($role->value)->toBeString();
            }
        )->with(UserRole::cases());

        test(
            'is instance of HasName',
            function (UserRole $role) {
                expect($role)->toBeInstanceOf(HasName::class);
            }
        )->with(UserRole::cases());

        test(
            'can get name',
            function (UserRole $role) {
                expect($role->name())->toBeString();
            }
        )->with(UserRole::cases());
    }
);
