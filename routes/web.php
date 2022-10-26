<?php

use App\Http\Controllers\DatabaseNotificationController;
use Illuminate\Support\Facades\Route;

//There is no front-end, feel free to build your own !
Route::redirect('/', 'login');

//All your dashboard's routes going to be here.
Route::group([
    'as'         => 'panel.',
    'middleware' => [
        'verified',
    ],
], static function () {
    Route::view('dashboard', 'pages.panel.dashboard')->name('dashboard');

    Route::controller(DatabaseNotificationController::class)
        ->prefix('notifications')
        ->name('notifications.')
        ->group(static function () {
            Route::get('/', 'index')->name('index');
            Route::match(['PUT', 'PATCH'], '/markAllReads', 'markAllReads')->name('markAllReads');
            Route::delete('/deleteAll', 'deleteAll')->name('deleteAll');
        });
});
