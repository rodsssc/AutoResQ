<?php

use App\Http\Controllers\mechanic\MechanicInformationController;
use App\Http\Controllers\mechanic\MechanicProfileController;

use App\Http\Controllers\RequestDescriptionController;
use App\Http\Controllers\ServiceRequest\RequestController;
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

// Route::get("/ServiceRequest",[ControllersServiceRequestController::class,'index'])->name("ServiceRequest.index");

// Route::get("/RequestDescription",[RequestDescriptionController::class,'index'])->name("RequestDescription.index");


Route::get("/mechanic_information/{id}", [MechanicProfileController::class, 'MechanicInformation'])
    ->name('mechanic.information');




// Updated Routes (web.php or api.php)

 Route::post('/send_service_request', [RequestController::class, 'SendServiceRequest'])
    ->name('service_request.send');