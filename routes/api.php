<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ActionController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LabelController;
use App\Http\Controllers\ListObjectController;
use App\Http\Controllers\ProcessController;
use Illuminate\Support\Facades\Route;

// process
Route::prefix('/process')->group(function() {
   Route::resource('/', ProcessController::class);
})->middleware('auth:sanctum');

// account
Route::prefix('/account')->group(function () {
    Route::resource('/', AccountController::class);
    Route::put('/change-pass', [AccountController::class, 'changePass'])->middleware('auth:sanctum');
});

// label
Route::prefix('/label')->group(function () {
    Route::resource('/', LabelController::class);
})->middleware('auth:sanctum');

// list
Route::prefix('/list')->group(function () {
    Route::resource('/', ListObjectController::class);
})->middleware('auth:sanctum');

// card
Route::prefix('/card')->group(function () {
    Route::resource('/', CardController::class);
})->middleware('auth:sanctum');

// item
Route::prefix('/item')->group(function () {
    Route::resource('/', ItemController::class);
})->middleware('auth:sanctum');

// checklist
Route::prefix('/checklist')->group(function () {
    Route::resource('/', ChecklistController::class);
})->middleware('auth:sanctum');

// action
Route::prefix('/action')->group(function () {
    Route::resource('/', ActionController::class);
})->middleware('auth:sanctum');
