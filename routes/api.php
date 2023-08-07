<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\SermonController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TokenController;

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

Route::post('/sanctum/token', TokenController::class);
Route::get('/events/get-all', [EventController::class, 'getAll']);
Route::get('/events/get/{slug}', [EventController::class, "show"]);


Route::get('/gallery/get-all', [GalleryController::class, 'getAll']);
Route::get('/sermons/get-all', [SermonController::class, 'getAll']);
Route::get('/sermons/get/{slug}', [SermonController::class, 'show']);



Route::middleware(['auth:sanctum', 'apply_locale'])->group(function () {

    /**
     * Auth related
     */
    Route::get('/users/auth', AuthController::class);

    /**
     * Users
     */
    Route::put('/users/{user}/avatar', [UserController::class, 'updateAvatar']);
    Route::resource('users', UserController::class);
    Route::resource('events', EventController::class);
    Route::resource('sermons', SermonController::class);
    Route::resource('gallery', GalleryController::class);

    /**
     * Roles
     */
    Route::get('/roles/search', [RoleController::class, 'search'])->middleware('throttle:400,1');
});
