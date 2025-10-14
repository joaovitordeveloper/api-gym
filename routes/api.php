<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\InstitutionsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Users
Route::get('user/get-all-users', [UserController::class, 'index']);
Route::get('user/get-user', [UserController::class, 'search']);
Route::post('user/register', [UserController::class, 'create']);
Route::put('user/update', [UserController::class, 'update']);
Route::delete('user/delete', [UserController::class, 'delete']);

// Institutions
Route::get('institutions/get-all-institutions', [InstitutionsController::class, 'index']);
Route::get('institutions/get-institution', [InstitutionsController::class, 'search']);
Route::post('institutions/register', [InstitutionsController::class, 'create']);
Route::put('institutions/update', [InstitutionsController::class, 'update']);
Route::delete('institutions/delete', [InstitutionsController::class, 'delete']);


//Plans
Route::get('plans/get-all-plans', [PlansController::class, 'index']);
Route::get('plans/get-plan', [PlansController::class, 'search']);
Route::post('plans/register', [PlansController::class, 'create']);
Route::put('plans/update', [PlansController::class, 'update']);
Route::delete('plans/delete', [PlansController::class, 'delete']);