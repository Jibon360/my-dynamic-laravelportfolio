<?php

use App\Models\Testimony;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Backend\Available;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\LogoController;
use App\Http\Controllers\Backend\WorkController;
use App\Http\Controllers\Backend\AboutController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\FooterController;
use App\Http\Controllers\Backend\SkillsController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ServicesController;
use App\Http\Controllers\Backend\TestimonyController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\SocialShareButtonsController;
use App\Http\Controllers\Backend\SkillheadingController;
use App\Http\Controllers\Backend\Servicecaptioncontroller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// frontend controller
Route::controller(FrontendController::class)->group(function () {
    Route::get('/', 'index')->name('frontpage');
    Route::get('single/blog/{id}', 'singleblog')->name('single.blog');
    Route::get('search/blog', 'searchblog')->name('searchblog');
});
Route::get('/social-media-share', [SocialShareButtonsController::class, 'ShareWidget']);
Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->group(function () {
    // admin controller
    Route::controller(HomeController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('home');
    });
    // logo route
    Route::resource('logo', LogoController::class);
    // banner
    Route::resource('banner', BannerController::class);
    // about
    Route::resource('about', AboutController::class);
    // skill
    // skill-heading controller
    Route::resource('skillheading', SkillheadingController::class);
    // skills
    Route::resource('skill', SkillsController::class);
    // Services
    // Services captions
    Route::resource('servicecaption', Servicecaptioncontroller::class);
    // servics
    Route::resource('services', ServicesController::class);

    // Available
    Route::resource('availabble', Available::class);
    // testimony
    Route::resource('testimony', TestimonyController::class);
    // work
    Route::resource('work', WorkController::class);
    // contact
    Route::resource('contact', ContactController::class);
    // Footer
    Route::resource('footer', FooterController::class);
    // Category
    Route::resource('category', CategoryController::class);
    // blog
    Route::resource('blog', BlogController::class);
});
