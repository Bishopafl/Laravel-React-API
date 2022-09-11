<?php

use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\AdminUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
});

Route::get('/logout', [AdminUserController::class, 'AdminLogout'])->name('admin.logout');

/**
 * User Profile Routes
 */
Route::prefix('admin')->group(function() {

    Route::get('/user/profile', [AdminUserController::class, 'UserProfile'])->name('user.profile');
    Route::get('/user/profile/edit', [AdminUserController::class, 'UserProfileEdit'])->name('user.profile.edit');
    Route::post('/user/profile/store', [AdminUserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/change/password', [AdminUserController::class, 'UserChangePassword'])->name('change.password');
    Route::post('/change/password/update', [AdminUserController::class, 'UserPasswordUpdate'])->name('change.password.update');
    all.information 
});

/**
 * All Information Routes
 */
Route::prefix('information')->group(function() {

    Route::get('/information/all', [InformationController::class, 'AllInformation'])->name('all.information');

});