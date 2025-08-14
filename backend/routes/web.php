<?php

use App\Http\Controllers\Admin\ManageUserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/admin/DisplayUser', [ManageUserController::class, 'DisplayUsers'])->name('admin.users');
Route::get('/admin/DisplayUser/{id}', [ManageUserController::class, 'DisplayUserById'])->name('admin.user.show');
Route::post('/admin/SaveVerification', [ManageUserController::class, 'SaveVerification'])
     ->name('admin.user.saveVerification');
Route::put('/admin/VerifyUser/{id}', [ManageUserController::class, 'VerifyUser'])->name('admin.user.verify');
