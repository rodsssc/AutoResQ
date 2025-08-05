<?php

use App\Http\Controllers\RequestDescriptionController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\UserController;
use App\Models\RequestDescription;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get("/manage_users",[UserController::class, 'index'])
    ->name('manage_users.index');

Route::get("/ServiceRequest",[ServiceRequestController::class,'index'])->name("ServiceRequest.index");

Route::get("/RequestDescription",[RequestDescriptionController::class,'index'])->name("RequestDescription.index");