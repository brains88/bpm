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
    Route::get('/translate', [\App\Http\Controllers\TranslationController::class, 'index'])->name('translate');

    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/about', [AboutController::class, 'index'])->name('about');

    Route::get('/membership', [\App\Http\Controllers\MembershipController::class, 'index'])->name('membership');

    Route::get('/logout', [\App\Http\Controllers\LoginController::class, 'logout'])->name('logout');
    Route::post('/auth', [\App\Http\Controllers\LoginController::class, 'auth'])->name('auth.login');
    
    Route::group(['prefix' => 'login', 'middleware' => 'guest'], function () {
        Route::get('/', [\App\Http\Controllers\LoginController::class, 'index'])->name('login');
    });

    Route::group(['prefix' => 'signup', 'middleware' => 'guest'], function () {
        Route::get('/', [\App\Http\Controllers\SignupController::class, 'index'])->name('signup');
        Route::post('/process', [\App\Http\Controllers\SignupController::class, 'signup'])->name('signup.process');
        Route::get('/success', [\App\Http\Controllers\SignupController::class, 'success'])->name('signup.success');
    });

    Route::group(['prefix' => 'verify'], function () {
        Route::get('/phone/{reference}', [VerifyController::class, 'phone'])->name('phone.verify');
        Route::post('/otp/{reference}', [VerifyController::class, 'otpverify'])->name('otp.verify');
        Route::post('/resendotp/{reference}', [VerifyController::class, 'resendotp'])->name('resend.otp');
        Route::get('/email/{token}', [VerifyController::class, 'email'])->name('verify.email');
        Route::post('/resendtoken/{token}', [VerifyController::class, 'resendtoken'])->name('token.resend');
        Route::get('/resent', [VerifyController::class, 'resent'])->name('token.resent');
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
    Route::prefix('artisans')->group(function () {
        Route::get('/', [ArtisansController::class, 'index'])->name('artisans');
        Route::get('/profile/{id}/{name}', [ArtisansController::class, 'profile'])->name('artisan.profile');
    });

    Route::prefix('agents')->group(function () {
        Route::get('/', [AgentsController::class, 'index'])->name('agents');
        Route::get('/profile/{id}/{name}', [AgentsController::class, 'profile'])->name('agent.profile');
    });

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

    Route::prefix('review')->group(function () {
        Route::post('/edit/{id}', [\App\Http\Controllers\User\ReviewsController::class, 'edit'])->name('review.edit');
        Route::post('/add/{profileid}', [\App\Http\Controllers\User\ReviewsController::class, 'add'])->name('review.add');
    });
});

Route::middleware(['web', 'auth', 'admin', 'revalidate'])->domain(env('ADMIN_URL'))->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/countries', [\App\Http\Controllers\Admin\CountriesController::class, 'index'])->name('admin.countries');

    Route::get('/subscriptions', [\App\Http\Controllers\Admin\SubscriptionsController::class, 'index'])->name('admin.subscriptions');

    Route::get('/adverts', [\App\Http\Controllers\Admin\SubscriptionsController::class, 'index'])->name('admin.adverts');

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

    Route::prefix('payments')->group(function () {
        Route::get('/search/{query?}', [\App\Http\Controllers\Admin\PaymentsController::class, 'search'])->name('admin.payments.search');
        Route::get('/{type?}', [\App\Http\Controllers\Admin\PaymentsController::class, 'index'])->name('admin.payments');
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

        Route::get('/add', [\App\Http\Controllers\Admin\PropertiesController::class, 'add'])->name('admin.property.add');
        Route::get('/edit/{id}', [\App\Http\Controllers\Admin\PropertiesController::class, 'edit'])->name('admin.property.edit');

        Route::post('/add', [\App\Http\Controllers\Api\PropertiesController::class, 'add'])->name('admin.property.add');
        Route::post('/update/{id}', [\App\Http\Controllers\Api\PropertiesController::class, 'update'])->name('admin.property.edit');

        Route::get('/category/{categoryname}', [\App\Http\Controllers\Admin\PropertiesController::class, 'category'])->name('admin.properties.category');

        Route::get('/action/{action}', [\App\Http\Controllers\Admin\PropertiesController::class, 'action'])->name('admin.properties.action');
    });

    Route::get('/categories', [\App\Http\Controllers\Admin\CategoriesController::class, 'index'])->name('admin.categories');
    Route::prefix('category')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Admin\CategoriesController::class, 'add'])->name('admin.category.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\CategoriesController::class, 'edit'])->name('admin.category.edit');
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\UsersController::class, 'index'])->name('admin.users');
        Route::get('/search', [\App\Http\Controllers\Admin\UsersController::class, 'search'])->name('admin.users.search');
        
        Route::get('/role/{role}', [\App\Http\Controllers\Admin\UsersController::class, 'role'])->name('admin.users.role');
        Route::get('/profile/{id}', [\App\Http\Controllers\Admin\UsersController::class, 'profile'])->name('admin.user.profile');
    });

    Route::prefix('blogs')->group(function () {
        Route::get('/', [\App\Http\Controllers\Admin\BlogsController::class, 'index'])->name('admin.blogs');
        Route::post('/image/upload/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'image'])->name('blog.image.upload');
        Route::post('/store', [\App\Http\Controllers\Admin\BlogsController::class, 'store'])->name('admin.blog.store');

        Route::post('/status/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'status'])->name('blog.status');
        Route::post('/delete/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'delete'])->name('blog.delete');

        Route::post('/edit/{id}', [\App\Http\Controllers\Admin\BlogsController::class, 'edit'])->name('admin.blog.edit');
    });

});

Route::middleware(['web', 'auth', 'user', 'revalidate', 'profile.setup'])->domain(env('USER_URL'))->group(function() {
    Route::get('/', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/subscription', [\App\Http\Controllers\User\DashboardController::class, 'index'])->name('user.subscription');

    Route::prefix('gigs')->group(function () {
        Route::get('/', [\App\Http\Controllers\User\GigsController::class, 'index'])->name('user.gigs');
        Route::post('/create', [\App\Http\Controllers\User\GigsController::class, 'create'])->name('user.gig.create');
        Route::post('/edit/{id}', [\App\Http\Controllers\User\GigsController::class, 'edit'])->name('user.gig.edit');
    });

    Route::prefix('socials')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Api\SocialsController::class, 'add'])->name('user.social.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Api\SocialsController::class, 'edit'])->name('user.social.edit');
    });

    Route::prefix('certifications')->group(function () {
        Route::post('/add', [\App\Http\Controllers\Api\CertificationsController::class, 'add'])->name('user.certification.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Api\CertificationsController::class, 'edit'])->name('user.certification.edit');
    });

    Route::prefix('adverts')->group(function () {
        Route::post('/post', [\App\Http\Controllers\Api\AdvertsController::class, 'post'])->name('user.advert.post');
        Route::post('/edit/{id}', [\App\Http\Controllers\Api\AdvertsController::class, 'edit'])->name('user.advert.edit');
        Route::post('/pause/{id}', [\App\Http\Controllers\Api\AdvertsController::class, 'pause'])->name('user.advert.pause');
        
        Route::post('/resume/{id}', [\App\Http\Controllers\Api\AdvertsController::class, 'resume'])->name('user.advert.resume');
        Route::post('/banner/upload/{id}', [\App\Http\Controllers\Api\AdvertsController::class, 'banner'])->name('advert.banner.upload');

        Route::post('/activate/{id}', [\App\Http\Controllers\Api\AdvertsController::class, 'activate'])->name('user.advert.activate');
        Route::post('/remove/{id}', [\App\Http\Controllers\Api\AdvertsController::class, 'remove'])->name('user.advert.remove');
        
        Route::post('/cancel/{id}', [\App\Http\Controllers\Api\AdvertsController::class, 'cancel'])->name('user.advert.cancel');
    });

    Route::post('/image/upload/{id}', [\App\Http\Controllers\Api\ProfileController::class, 'upload'])->name('user.profile.image.upload');

    Route::prefix('profile')->group(function () {
        Route::get('/', [\App\Http\Controllers\User\ProfileController::class, 'index'])->name('user.profile');
        Route::post('/add', [\App\Http\Controllers\Api\ProfileController::class, 'add'])->name('user.profile.add');
        Route::post('/edit/{id}', [\App\Http\Controllers\Api\ProfileController::class, 'edit'])->name('user.profile.edit');
        Route::post('/image/upload/{id}', [\App\Http\Controllers\Api\ProfileController::class, 'remove'])->name('user.profile.image.remove');
    });

    Route::get('/credits', [\App\Http\Controllers\User\CreditsController::class, 'index'])->name('user.credits');
    Route::get('/reviews', [\App\Http\Controllers\User\ReviewsController::class, 'index'])->name('user.reviews');

    Route::post('/initialize', [App\Http\Controllers\User\SubscriptionController::class, 'initialize'])->name('user.subscription.payment.initialize');

    Route::post('/cancel/{id}', [\App\Http\Controllers\User\SubscriptionController::class, 'cancel'])->name('user.subscription.cancel');
    Route::post('/renew/{id}', [\App\Http\Controllers\User\SubscriptionController::class, 'renew'])->name('user.subscription.renew');
    Route::post('/activate/{id}', [\App\Http\Controllers\User\SubscriptionController::class, 'activate'])->name('user.subscription.activate');

    Route::post('/credits/buy', [\App\Http\Controllers\User\CreditsController::class, 'buy'])->name('user.credits.buy');

    Route::prefix('properties')->group(function () {
        Route::get('/', [\App\Http\Controllers\User\PropertiesController::class, 'index'])->name('user.properties');

        Route::get('/edit/{category}/{id}', [\App\Http\Controllers\User\PropertiesController::class, 'edit'])->name('user.property.edit');
        Route::get('/add', [\App\Http\Controllers\User\PropertiesController::class, 'add'])->name('user.property.add');

        Route::post('/promote/{id}', [\App\Http\Controllers\Api\PropertiesController::class, 'promote'])->name('user.property.promote');
        Route::post('/specifics/{id}', [\App\Http\Controllers\Api\PropertiesController::class, 'specifics'])->name('user.property.specifics.update');
        Route::post('/update/{id}', [\App\Http\Controllers\Api\PropertiesController::class, 'update'])->name('user.property.update');
        Route::post('/add', [\App\Http\Controllers\Api\PropertiesController::class, 'add'])->name('user.property.add');
    });

    Route::prefix('materials')->group(function () {
        Route::get('/', [\App\Http\Controllers\User\MaterialsController::class, 'index'])->name('user.materials');

        Route::get('/edit/{id}', [\App\Http\Controllers\User\MaterialsController::class, 'edit'])->name('user.material.edit');
        Route::get('/add', [\App\Http\Controllers\User\MaterialsController::class, 'add'])->name('user.material.add');

        Route::post('/edit/{id}', [\App\Http\Controllers\Api\MaterialsController::class, 'edit'])->name('user.material.edit');
        Route::post('/add', [\App\Http\Controllers\Api\MaterialsController::class, 'add'])->name('user.material.add');
    });
});

Route::fallback(function () {
    Route::middleware(['web'])->domain('https://www.bestpropertymarket.com')->group(function () {
        Route::get('/', [HomeController::class, 'index'])->name('home');
    });

    return redirect()->route('home');
});


    

