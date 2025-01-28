<?php

namespace App\Http\Controllers\Grades;

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

        Route::group(['namespaces' => 'Grades'], function () {

            Route::resource('Grades', GradeController::class);
        });
    }
);

require __DIR__ . '/auth.php';
