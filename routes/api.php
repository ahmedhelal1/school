<?php

use App\Http\Controllers\Api\GradeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\New_GradeController;



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/Grades', [GradeController::class, 'index']);
Route::get('/Grade/{id}', [GradeController::class, 'show']);
Route::post('/Grade', [GradeController::class, 'store']);
Route::post('/Grade/{id}', [GradeController::class, "update"]);






////////////

Route::get('/NewGrades', [New_GradeController::class, 'index']);
Route::get('/NewGrades/{id}', [New_GradeController::class, 'show']);
