**Booking System**
================

A web-based application that allows administrators to manage different types of bookings (e.g. tennis courts, snooker tables) and clients to book these items.

**Features**
------------

### Admin Panel

* Add new booking types (e.g. tennis court, snooker table)
* Manage existing booking types (edit, delete)
* View booking type details (price, etc.)

### Client Portal

* Browse available booking types
* Book a specific booking type for a chosen time slot
* View client's upcoming bookings and past bookings

**Installation**
---------------

To get started with the project, follow these steps:

1. Clone the repository using `git clone https://github.com/shutodown57/booking.git`
2. Install dependencies by running `npm install`
3. Create a database schema for the application (see `config/database.js`)
4. Run migrations to set up the database tables (`php artisan migrate`)

**Usage**
-----

1. Start the development back-end server by running `php artisan serve`
2. Start the development front-end server by running `npm run dev`
3. Access the application at `http://localhost:8000`

**Tests**
-----

* Running tests by `php artisan test` or `php artisan test -p` for parallel.
* Running tests coverage by `php artisan test --coverage`.
* Running tests profile by `php artisan test --profile`.

### Endpoints

* GET|HEAD  `/`: Retrieve index page.

* GET|HEAD  `/bookable`: Retrieve index bookable page.
* POST      `/bookable`: Create new bookable.
* GET|HEAD  `/bookable/create`: Retrieve create bookable page.
* GET|HEAD  `/bookable/{bookable}`: Retrieve show bookable page.
* PUT       `/bookable/{bookable}`: Update an existing bookable.
* DELETE    `/bookable/{bookable}`: Delete a bookable.
* GET|HEAD  `/bookable/{bookable}/edit`: Retrieve edit bookable page.

* GET|HEAD  `/bookable-type`: Retrieve index bookable type page.
* POST      `/bookable-type`: Create new bookable type.
* GET|HEAD  `/bookable-type/create`: Retrieve create bookable type page.
* PUT       `/bookable-type/{bookableType}`: Update an existing bookable type.
* DELETE    `/bookable-type/{bookableType}`: Delete a bookable type.
* GET|HEAD  `/bookable-type/{bookableType}/edit`: Retrieve edit bookable type page.

* GET|HEAD  `/booking`: Retrieve index booking page.
* POST      `/booking`: Create new booking.
* GET|HEAD  `/booking/create`: Retrieve create booking page.
* PUT       `/booking/{id}`: Update an existing booking.
* DELETE    `/booking/{id}`: Delete a booking.
* GET|HEAD  `/booking/{id}/edit`: Retrieve edit booking page.

**Technology Stack**
-------------------

Laravel, Inertia/Vue3, TailwindCSS, SQLite3
