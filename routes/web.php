<?php

use App\Http\Controllers\BookableController;
use App\Http\Controllers\BookableTypeController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get(
    '/',
    function () {
        return Inertia::render(
            'Welcome',
            [
                'canLogin' => Route::has('login'),
                'canRegister' => Route::has('register'),
                'laravelVersion' => Application::VERSION,
                'phpVersion' => PHP_VERSION,
            ]
        );
    }
);

Route::get(
    '/dashboard',
    function () {
        return Inertia::render('Dashboard');
    }
)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(
    function () {
        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');
    }
);


Route::group(
    [
        'prefix' => 'bookable-type'
    ],
    function () {
        Route::get('/', [BookableTypeController::class, 'index'])
            ->name('bookable-type.index');
        Route::post('/', [BookableTypeController::class, 'store'])
            ->name('bookable-type.store');
        Route::get('/create', [BookableTypeController::class, 'create'])
            ->name('bookable-type.create');
        Route::get('/{bookableType}/edit', [BookableTypeController::class, 'edit'])
            ->name('bookable-type.edit');
        Route::put('/{bookableType}', [BookableTypeController::class, 'update'])
            ->name('bookable-type.update');
        Route::delete('/{bookableType}', [BookableTypeController::class, 'destroy'])
            ->name('bookable-type.destroy');
    }
);

Route::group(
    [
        'prefix' => 'bookable'
    ],
    function () {
        Route::get('/', [BookableController::class, 'index'])
            ->name('bookable.index');
        Route::post('/', [BookableController::class, 'store'])
            ->name('bookable.store');
        Route::get('/create', [BookableController::class, 'create'])
            ->name('bookable.create');
        Route::get('/{bookable}', [BookableController::class, 'show'])
            ->name('bookable.show');
        Route::get('/{bookable}/edit', [BookableController::class, 'edit'])
            ->name('bookable.edit');
        Route::put('/{bookable}', [BookableController::class, 'update'])
            ->name('bookable.update');
        Route::delete('/{bookable}', [BookableController::class, 'destroy'])
            ->name('bookable.destroy');
    }
);

Route::group(
    [
        'prefix' => 'booking'
    ],
    function () {
        Route::get('/', [BookingController::class, 'index'])
            ->name('booking.index');
        Route::get('/create', [BookingController::class, 'create'])
            ->name('booking.create');
        Route::post('/', [BookingController::class, 'store'])
            ->name('booking.store');
        Route::get('/{id}/edit', [BookingController::class, 'edit'])
            ->name('booking.edit');
        Route::put('/{id}', [BookingController::class, 'update'])
            ->name('booking.update');
        Route::delete('/{id}', [BookingController::class, 'destroy'])
            ->name('booking.destroy');
    }
);

require __DIR__.'/auth.php';
