<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [ApiController::class, 'login'])->name('api.login');
Route::post('/signup', [SignupController::class, 'signup'])->name('api.signup');

Route::group(['middleware' => [], 'prefix' => ''], function () {

    Route::prefix('property')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Api\PropertiesController::class, 'add'])->name('api.property.add');

        Route::post('/action/change/{id}', [\App\Http\Controllers\Api\PropertiesController::class, 'action'])->name('api.property.action.change');

        Route::post('/update/{id}/{category}', [\App\Http\Controllers\Api\PropertiesController::class, 'update'])->name('api.property.update');

        Route::post('/image/upload/{id}/{role}', [\App\Http\Controllers\Api\PropertiesController::class, 'image'])->name('api.property.image.upload');
    });

    Route::post('/password/email', [PasswordController::class, 'email'])->name('password.email')->name('api.');
    Route::post('/password/reset', [PasswordController::class, 'reset'])->name('password.reset')->name('api.');
    Route::post('/password/update', [PasswordController::class, 'update'])->name('password.update')->name('api.');

    Route::post('/logout', [ApiController::class, 'logout'])->name('api.logout');

});
