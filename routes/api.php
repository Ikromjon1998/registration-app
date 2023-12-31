<?php

use App\Http\Controllers\API\ApplicantController;
use App\Http\Controllers\API\ApprenticeshipController;
use App\Http\Controllers\API\EducationController;
use App\Http\Controllers\API\ResidenceController;
use App\Http\Controllers\API\Under18Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test', [ApplicantController::class, 'test'])->name('api.test');

Route::prefix('/applicants')->group(callback: function () {
    Route::post('/register', [ApplicantController::class, 'register'])->name('api.applicant.register');
    Route::post('/{applicant}/residences/save', [ResidenceController::class, 'store'])->name('api.residence.save');
    Route::post('/{applicant}/under18s/save', [Under18Controller::class, 'store'])->name('api.under18.save');
    Route::post('/{applicant}/apprenticeships/save', [ApprenticeshipController::class, 'store'])->name('api.apprenticeship.save');
    Route::post('/{applicant}/educations/save', [EducationController::class, 'store'])->name('api.education.save');
});
