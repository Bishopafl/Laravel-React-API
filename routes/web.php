<?php

use App\Http\Controllers\Admin\ArtworkController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\InformationController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ServiceController;
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
    
});

/**
 * All Information Routes
 */
Route::prefix('information')->group(function() {

    Route::get('/information/all', [InformationController::class, 'AllInformation'])->name('all.information');
    Route::get('/information/add', [InformationController::class, 'AddInformation'])->name('add.information');
    Route::post('/information/store', [InformationController::class, 'StoreInformation'])->name('information.store');
    Route::get('/information/edit/{id}', [InformationController::class, 'EditInformation'])->name('edit.information');
    Route::get('/information/delete/{id}', [InformationController::class, 'DeleteInformation'])->name('delete.information');
    Route::post('/information/update/{id}', [InformationController::class, 'UpdateInformation'])->name('information.update');

});

/**
 * All Services Routes
 */
Route::prefix('service')->group(function() {

    Route::get('/service/all', [ServiceController::class, 'AllServices'])->name('all.services');
    Route::get('/service/add', [ServiceController::class, 'AddServices'])->name('add.services');
    Route::post('/service/store', [ServiceController::class, 'StoreServices'])->name('services.store');
    Route::get('/service/edit/{id}', [ServiceController::class, 'EditServices'])->name('edit.services');
    Route::get('/service/delete/{id}', [ServiceController::class, 'DeleteServices'])->name('delete.services');
    Route::post('/service/update/', [ServiceController::class, 'UpdateServices'])->name('services.update');

});

/**
 * All Projects Routes
 */
Route::prefix('project')->group(function() {

    Route::get('/project/all', [ProjectController::class, 'AllProject'])->name('all.projects');
    Route::get('/project/add', [ProjectController::class, 'AddProject'])->name('add.projects');
    Route::post('/project/store', [ProjectController::class, 'StoreProject'])->name('projects.store');
    Route::get('/project/edit/{id}', [ProjectController::class, 'EditProject'])->name('edit.projects');
    Route::get('/project/delete/{id}', [ProjectController::class, 'DeleteProject'])->name('delete.projects');
    Route::post('/project/update/', [ProjectController::class, 'UpdateProject'])->name('projects.update');

});

/**
 * All Projects Routes
 */
Route::prefix('course')->group(function() {

    Route::get('/course/all', [CoursesController::class, 'AllCourses'])->name('all.courses');
    Route::get('/course/add', [CoursesController::class, 'AddCourses'])->name('add.courses');
    Route::get('/course/store', [CoursesController::class, 'StoreCourses'])->name('store.courses');
    Route::get('/course/edit/{CoursesController}', [CoursesController::class, 'EditCourses'])->name('edit.courses');
    Route::get('/course/delete/{CoursesController}', [CoursesController::class, 'DeleteCourses'])->name('delete.courses');
    Route::post('/course/update/', [CoursesController::class, 'UpdateCourses'])->name('courses.update');

});

/**
 * All Artwork Routes
 */
Route::prefix('artwork')->group(function() {

    Route::get('/artwork/all', [ArtworkController::class, 'AllArtworks'])->name('all.artworks');
    Route::get('/artwork/add', [ArtworkController::class, 'AddArtworks'])->name('add.artworks');
    Route::post('/artwork/store', [ArtworkController::class, 'StoreArtworks'])->name('artworks.store');
    Route::get('/artwork/edit/{id}', [ArtworkController::class, 'EditArtworks'])->name('edit.artworks');
    Route::get('/artwork/delete/{id}', [ArtworkController::class, 'DeleteArtworks'])->name('delete.artworks');
    Route::post('/artwork/update/', [ArtworkController::class, 'UpdateArtworks'])->name('artworks.update');

});