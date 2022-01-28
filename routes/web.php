<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{HomeController, AboutController, LoginController, SignupController, ServicesController, VerifyController, ContactController, PropertiesController, AgentsController, NewsController, ArtisansController, AdminController, UserController, PasswordController, CountriesController};

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

Route::middleware(['web'])->domain(env('APP_URL'))->group(function() {

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');
    Route::get('/agent', [AgentsController::class, 'index'])->name('agent');
    Route::get('/agency', [AgencyController::class, 'index'])->name('agency');

    Route::get('/memberships', [App\Http\Controllers\MembershipsController::class, 'index'])->name('memberships');

    // Route::get('/AdvancedSearch', [AdvancedSearchController::class, 'index'])->name('AdvancedSearch');
    // Kindly effect route below (AdvancedSearch) to standard used by you.
    Route::get('/AdvancedSearch', 'AdvancedSearchController@index')->name('AdvancedSearch');
    Route::get('/author', 'authorController@index')->name('author');

     // Kindly effect route below (Author) to standard used by you.
     Route::get('/agency', 'AgencyController@index')->name('agency');
     Route::get('/agencylisting', 'AgencyController@index')->name('agencylisting');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::post('/auth', [LoginController::class, 'auth'])->name('auth.login');
    
    Route::group(['prefix' => 'login', 'middleware' => 'guest'], function () {
        Route::get('/', [LoginController::class, 'index'])->name('login');
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
        Route::get('/country/{iso2}', [PropertiesController::class, 'country'])->name('properties.country');
        Route::get('/category/{category}', [PropertiesController::class, 'category'])->name('properties.category');

        Route::get('/{category}/{id}/{slug}', [PropertiesController::class, 'property'])->name('property.category.id.slug');
        Route::get('/{country}/{id}/{slug}', [PropertiesController::class, 'country'])->name('property.country.id.slug');

        Route::get('/search', [\App\Http\Controllers\PropertiesController::class, 'search'])->name('properties.search');
        Route::get('/action/{action}', [\App\Http\Controllers\PropertiesController::class, 'action'])->name('properties.action');
    });

    Route::prefix('news')->group(function () {
        Route::get('/', [NewsController::class, 'index'])->name('news');
        Route::get('/{id}/{slug}', [NewsController::class, 'read'])->name('news.read');
    });

    Route::prefix('blog')->group(function () {
        Route::get('/', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog');
        Route::get('/{id}/{slug}', [\App\Http\Controllers\BlogController::class, 'read'])->name('blog.read');
    });

    Route::get('/services', [ServicesController::class, 'index'])->name('services');
    Route::get('/agents', [AgentsController::class, 'index'])->name('agents');
    Route::get('/artisans', [ArtisansController::class, 'index'])->name('artisans');

    Route::group(['prefix' => 'password', 'middleware' => 'guest'], function () {
        Route::get('/', [PasswordController::class, 'index'])->name('forgot.password');
        Route::post('/email', [PasswordController::class, 'email'])->name('password.email');
        Route::get('/reset/{token}', [PasswordController::class, 'verify'])->name('reset.verify');
        Route::post('/reset', [PasswordController::class, 'reset'])->name('password.reset');
    });

    Route::prefix('materials')->group(function () {
        Route::get('/', [\App\Http\Controllers\MaterialsController::class, 'index'])->name('materials');
        Route::get('/category/{category}', [\App\Http\Controllers\MaterialsController::class, 'category'])->name('materials.category');

        Route::get('/{id}/{slug}', [\App\Http\Controllers\MaterialsController::class, 'material'])->name('material.id.slug');
        Route::get('/search', [\App\Http\Controllers\MaterialsController::class, 'search'])->name('materials.search');
    });
});

Route::middleware(['web', 'auth'])->domain(env('APP_URL'))->group(function() {
    Route::prefix('materials')->group(function () {
        Route::post('/edit/{id}', [\App\Http\Controllers\Api\MaterialsController::class, 'edit'])->name('material.edit');
        Route::post('/add', [\App\Http\Controllers\Api\MaterialsController::class, 'add'])->name('material.add');
    });
});

Route::middleware(['web', 'auth', 'admin'])->domain(env('ADMIN_URL'))->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('/countries', [\App\Http\Controllers\Admin\CountriesController::class, 'index'])->name('admin.countries');

    Route::get('/subscriptions', [\App\Http\Controllers\Admin\SubscriptionsController::class, 'index'])->name('admin.subscriptions');

    Route::get('/adverts', [\App\Http\Controllers\Admin\SubscriptionsController::class, 'index'])->name('admin.adverts');

    Route::get('/companies', [\App\Http\Controllers\Admin\SubscriptionsController::class, 'index'])->name('admin.companies');

    Route::get('/plans', [\App\Http\Controllers\Admin\PlansController::class, 'index'])->name('admin.plans');
    Route::prefix('plan')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Admin\PlansController::class, 'add'])->name('admin.plan.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\PlansController::class, 'edit'])->name('admin.plan.edit');
    });

    Route::get('/skills', [\App\Http\Controllers\Admin\SkillsController::class, 'index'])->name('admin.skills');
    Route::prefix('skill')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Admin\SkillsController::class, 'add'])->name('admin.skill.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\SkillsController::class, 'edit'])->name('admin.skill.edit');
    });

    Route::get('/plans', [\App\Http\Controllers\Admin\PlansController::class, 'index'])->name('admin.plans');
    Route::prefix('plan')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Admin\PlansController::class, 'add'])->name('admin.plan.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\PlansController::class, 'edit'])->name('admin.plan.edit');
    });

    Route::post('visitors/chart/timezone', [\App\Http\Controllers\Admin\Charts\VisitorsController::class, 'chart'])->name('admin.visitors.chart.timezones');

    Route::prefix('properties')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\PropertiesController::class, 'index'])->name('admin.properties');

        Route::post('/chart/{year}', [\App\Http\Controllers\Admin\Charts\PropertiesController::class, 'chart'])->name('admin.properties.chart');

        Route::get('/search/{query?}', [\App\Http\Controllers\Admin\PropertiesController::class, 'search'])->name('admin.properties.search');

        Route::get('/categories', [\App\Http\Controllers\Admin\PropertiesController::class, 'categories'])->name('admin.properties.categories');

        Route::get('/country/{countryid}', [\App\Http\Controllers\Admin\PropertiesController::class, 'country'])->name('admin.properties.country');

        Route::get('/category/{categoryname}', [\App\Http\Controllers\Admin\PropertiesController::class, 'category'])->name('admin.properties.category');

        Route::get('/user/{userid}', [\App\Http\Controllers\Admin\PropertiesController::class, 'user'])->name('admin.properties.user');
    });

    Route::prefix('property')->group(function () {
        Route::get('/edit/{category}/{id}', [\App\Http\Controllers\Admin\PropertiesController::class, 'edit'])->name('admin.property.edit');
        Route::get('/add', [\App\Http\Controllers\Admin\PropertiesController::class, 'add'])->name('admin.property.add');
    });

    Route::get('/categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
    Route::prefix('category')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Admin\CategoriesController::class, 'add'])->name('admin.category.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->name('admin.category.edit');
    });

    Route::get('/individuals', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users.individuals');

    Route::get('/companies', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users.companies');

    Route::prefix('users')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users');
        
        Route::get('/role/{role}', [\App\Http\Controllers\Admin\UsersController::class, 'role'])->name('admin.users.role');
    });

    Route::prefix('user')->group(function () {
        Route::post('/profile/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'profile'])->name('admin.user.profile');
        Route::post('/properties/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'properties'])->name('admin.user.properties');
    });

    Route::prefix('subcategory')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Admin\SubcategoriesController::class, 'add'])->name('admin.subcategory.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\SubcategoriesController::class, 'edit'])->name('admin.subcategory.edit');
    });

    Route::prefix('blogs')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\BlogsController::class, 'index'])->name('admin.blogs');
    });

    Route::prefix('blog')->group(function () {
        Route::post('/image/upload/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'image'])->name('blog.image.upload');
        Route::post('/store', [\App\Http\Controllers\Admin\BlogsController::class, 'store'])->name('admin.blog.store');

        Route::post('/status/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'status'])->name('blog.status');
        Route::post('/delete/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'delete'])->name('blog.delete');

        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'edit'])->name('admin.blog.edit');
    });

});

Route::middleware(['web', 'auth', 'user'])->domain(env('USER_URL'))->group(function() {
    Route::get('/', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('user');
    Route::get('/profile', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('user.profile');

    Route::get('/credits', [\App\Http\Controllers\User\CreditsController::class, 'index'])->name('user.credits');

    Route::post('/initialize', [App\Http\Controllers\User\SubscriptionController::class, 'initialize'])->name('user.subscription.payment.initialize');

    Route::post('/cancel/{id}', [\App\Http\Controllers\User\SubscriptionController::class, 'cancel'])->name('user.subscription.cancel');
    Route::post('/renew/{id}', [\App\Http\Controllers\User\SubscriptionController::class, 'renew'])->name('user.subscription.renew');
    Route::post('/activate/{id}', [\App\Http\Controllers\User\SubscriptionController::class, 'activate'])->name('user.subscription.activate');

    Route::post('/credits/buy', [\App\Http\Controllers\User\CreditsController::class, 'buy'])->name('user.credits.buy');

    Route::prefix('properties')->group(function () {
        Route::get('/', [\App\Http\Controllers\User\PropertiesController::class, 'index'])->name('user.properties');

        Route::get('/edit/{id}', [\App\Http\Controllers\User\PropertiesController::class, 'edit'])->name('user.property.edit');
        Route::get('/add', [\App\Http\Controllers\User\PropertiesController::class, 'add'])->name('user.property.add');

        Route::post('/promote/{id}', [\App\Http\Controllers\User\PropertiesController::class, 'promote'])->name('user.property.promote');
    });

    Route::prefix('materials')->group(function () {
        Route::get('/', [\App\Http\Controllers\User\MaterialsController::class, 'index'])->name('user.materials');

        Route::get('/edit/{id}', [\App\Http\Controllers\User\MaterialsController::class, 'edit'])->name('user.material.edit');
        Route::get('/add', [\App\Http\Controllers\User\MaterialsController::class, 'add'])->name('user.material.add');
    });
});


    

