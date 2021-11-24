<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, AboutController, LoginController, SignupController, ServicesController, VerifyController, ContactController, PropertiesController, AgentsController, NewsController, ArtisansController, AdminController, UserController, PasswordController};

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

Route::middleware('web')->domain(env('APP_URL'))->group(function() {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::group(['prefix' => 'login', 'middleware' => 'guest'], function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
        Route::post('/signin', [LoginController::class, 'authenticate'])->name('login.signin');
    });

    Route::group(['prefix' => 'signup', 'middleware' => 'guest'], function () {
        Route::get('/', [SignupController::class, 'index'])->name('signup');
        Route::post('/individual', [SignupController::class, 'individual'])->name('signup.individual');
        Route::post('/corporate', [SignupController::class, 'corporate'])->name('signup.corporate');
        Route::get('/success', [SignupController::class, 'success'])->name('signup.success');
    });

    Route::group(['prefix' => 'verify', 'middleware' => 'guest'], function () {
        Route::get('/', [VerifyController::class, 'index'])->name('verify');
        Route::post('/activate', [VerifyController::class, 'activate'])->name('signup.activate');
        Route::post('/resend', [VerifyController::class, 'resend'])->name('verify.code.resend');
        Route::post('/email', [VerifyController::class, 'email'])->name('verify.email');
        Route::post('/phone', [VerifyController::class, 'phone'])->name('verify.phone');
    });

    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('contact');
        Route::post('/send', [ContactController::class, 'send'])->name('contact.send');
        Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');
    });

    Route::prefix('properties')->group(function () {
        Route::get('/', [PropertiesController::class, 'index'])->name('properties');
        Route::get('/{category}', [PropertiesController::class, 'category'])->name('properties.category');
        Route::get('/global/{country?}', [PropertiesController::class, 'country'])->name('properties.country');
    });

    Route::prefix('property')->group(function () {
        Route::get('/{category?}/{id}/{slug}', [PropertiesController::class, 'property'])->name('property.category.id.slug');
        Route::get('/{country}/{id}/{slug}', [PropertiesController::class, 'country'])->name('property.country.id.slug');
    });

    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/agents', [AgentsController::class, 'index'])->name('agents');
    Route::get('/news', [NewsController::class, 'index'])->name('news');
    Route::get('/artisans', [ArtisansController::class, 'index'])->name('artisans');

    Route::group(['prefix' => 'password', 'middleware' => 'guest'], function () {
        Route::get('/', [PasswordController::class, 'index'])->name('forgot.password');
        Route::post('/email', [PasswordController::class, 'email'])->name('password.email');
        Route::get('/reset/{token}', [PasswordController::class, 'verify'])->name('reset.verify');
        Route::post('/reset', [PasswordController::class, 'reset'])->name('password.reset');
    });
});

Route::middleware('web')->domain('admin.'.env('APP_URL'))->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
});

Route::middleware('web')->domain('app.'.env('APP_URL'))->group(function() {
    Route::get('/', [UserController::class, 'index'])->name('app');
});


    

