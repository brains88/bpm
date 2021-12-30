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
    Route::get('/agency', [AboutController::class, 'index'])->name('agency');

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

    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::get('/{id}/{slug}', [NewsController::class, 'read'])->name('news.read');
    });

    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/agents', [AgentsController::class, 'index'])->name('agents');
    Route::get('/artisans', [ArtisansController::class, 'index'])->name('artisans');
   //Route::get('/listing', [PagesController::class, 'listing'])->name('listing');
    Route::get('/listing', 'PagesController@listing')->name('listing');
    

    Route::group(['prefix' => 'password', 'middleware' => 'guest'], function () {
        Route::get('/', [PasswordController::class, 'index'])->name('forgot.password');
        Route::post('/email', [PasswordController::class, 'email'])->name('password.email');
        Route::get('/reset/{token}', [PasswordController::class, 'verify'])->name('reset.verify');
        Route::post('/reset', [PasswordController::class, 'reset'])->name('password.reset');
    });
});

Route::middleware('web')->domain('admin.'.env('APP_URL'))->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::prefix('properties')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\PropertiesController::class, 'index'])->name('admin.properties');
        Route::get('/categories', [\App\Http\Controllers\Admin\PropertiesController::class, 'categories'])->name('admin.properties.categories');
    });

    Route::prefix('property')->group(function () {
        Route::get('/add', [\App\Http\Controllers\Admin\PropertiesController::class, 'add'])->name('admin.property.add');
    });

    Route::get('/categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
    Route::prefix('category')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Admin\CategoriesController::class, 'add'])->name('admin.category.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->name('admin.category.edit');
    });

    Route::prefix('subcategory')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Admin\SubcategoriesController::class, 'add'])->name('admin.subcategory.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\SubcategoriesController::class, 'edit'])->name('admin.subcategory.edit');
    });

    Route::prefix('blogs')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\BlogsController::class, 'index'])->name('admin.blogs');
        Route::get('/categories', [\App\Http\Controllers\Admin\BlogsController::class, 'categories'])->name('admin.blogs.categories');
    });

    Route::prefix('blog')->group(function () {
        Route::post('/image/upload/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'image'])->name('blog.image.upload');
        Route::post('/store', [\App\Http\Controllers\Admin\BlogsController::class, 'store'])->name('admin.blog.store');

        Route::post('/status/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'status'])->name('blog.status');
        Route::post('/delete/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'delete'])->name('blog.delete');

        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'edit'])->name('admin.blog.edit');
    });

});

// Route::middleware('web')->domain('app.'.env('APP_URL'))->group(function() {
 
    Route::get('/', [HomeController::class, 'index'])->name('app');
// });


    

