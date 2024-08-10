<?php

use App\Enums\BookableUserStatus;
use App\Interfaces\HasColor;
use App\Interfaces\HasName;

describe(
    'BookableUserStatus enum',
    function () {
        test(
            'has exact 3 cases',
            function () {
                expect(count(BookableUserStatus::cases()))->toBe(3);
            }
        );

        test(
            'can get value',
            function (BookableUserStatus $status) {
                expect($status->value)->toBeInt();
            }
        )->with(BookableUserStatus::cases());

        test(
            'is instance of HasName',
            function (BookableUserStatus $status) {
                expect($status)->toBeInstanceOf(HasName::class);
            }
        )->with(BookableUserStatus::cases());

        test(
            'is instance of HasColor',
            function (BookableUserStatus $status) {
                expect($status)->toBeInstanceOf(HasColor::class);
            }
        )->with(BookableUserStatus::cases());

        test(
            'can get name',
            function (BookableUserStatus $status) {
                expect($status->name())->toBeString();
            }
        )->with(BookableUserStatus::cases());

        test(
            'can get color',
            function (BookableUserStatus $status) {
                expect($status->color())->toBeString();
            }
        )->with(BookableUserStatus::cases());
    }
);
