<?php

use App\Enums\BookableStatus;
use App\Interfaces\HasColor;
use App\Interfaces\HasName;

describe(
    'BookableStatus enum',
    function () {
        test(
            'has exact 2 cases',
            function () {
                expect(count(BookableStatus::cases()))->toBe(2);
            }
        );

        test(
            'can get value',
            function (BookableStatus $status) {
                expect($status->value)->toBeInt();
            }
        )->with(BookableStatus::cases());

        test(
            'is instance of HasName',
            function (BookableStatus $status) {
                expect($status)->toBeInstanceOf(HasName::class);
            }
        )->with(BookableStatus::cases());

        test(
            'is instance of HasColor',
            function (BookableStatus $status) {
                expect($status)->toBeInstanceOf(HasColor::class);
            }
        )->with(BookableStatus::cases());

        test(
            'can get name',
            function (BookableStatus $status) {
                expect($status->name())->toBeString();
            }
        )->with(BookableStatus::cases());

        test(
            'can get color',
            function (BookableStatus $status) {
                expect($status->color())->toBeString();
            }
        )->with(BookableStatus::cases());
    }
);
