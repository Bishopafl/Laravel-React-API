<?php

use App\Http\Controllers\Admin\ArtworkController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ChartController;
use App\Http\Controllers\Admin\ClientReviewController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CoursesController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\InformationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/chartdata', [ChartController::class, 'onAllSelect']);
// client reviews route
Route::get('/clientreviewdata', [ClientReviewController::class, 'onAllSelect']);
// Contact form route
Route::post('/contactsend', [ContactController::class, 'onContactSend']);
// Contact form route
Route::get('/coursehome', [CoursesController::class, 'onSelectFour']);
Route::get('/courseall', [CoursesController::class, 'onSelectAll']);
Route::post('/coursedetails', [CoursesController::class, 'onSelectDetails']);
// footer routes
Route::get('/footerdata', [FooterController::class, 'onAllSelect']);
// artwork routes
Route::get('/artworkdata', [ArtworkController::class, 'onAllSelect']);
// information routes
Route::get('/informationdata', [InformationController::class, 'onAllSelect']);
Route::get('/informationdata/refund', [InformationController::class, 'onAllRefund']);
Route::get('/informationdata/terms', [InformationController::class, 'onAllTerms']);
Route::get('/informationdata/privacy', [InformationController::class, 'onAllPrivacy']);