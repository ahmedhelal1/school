<?php

use App\Http\Controllers\Grades\GradeController;
use App\Http\Controllers\ClassRoom\ClassRoomController;

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;




Route::group(
    ['middleware' => ['guest']],
    function () {
        Route::get('/', function () {
            return view('auth.login');
        });
    }
);


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
    ],
    function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        });

        // Route::group(['namespace' => 'Grades'], function () {

        //     Route::resource('Grades', GradeController::class);
        // });
        // Route::group(['namespace' => 'ClassRoom'], function () {

        //     Route::resource('ClassRoom', ClassRoomController::class);
        // });

        Route::resource('Grades', GradeController::class);
        Route::resource('ClassRoom', ClassRoomController::class);
    }
);

require __DIR__ . '/auth.php';
