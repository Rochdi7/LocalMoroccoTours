<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController as FrontPostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\FrontTourController;
use App\Http\Controllers\FrontActivityController;
use App\Http\Controllers\FrontTrekkingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TourCategoryController;
use App\Http\Controllers\Admin\TourController as AdminTourController;
use App\Http\Controllers\Admin\LocationController as AdminLocationController;
use App\Http\Controllers\Admin\ActivityCategoryController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\TrekkingCategoryController;
use App\Http\Controllers\Admin\TrekkingController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\SpecialOfferController;
use App\Http\Controllers\Admin\RatingCategoryController;
use App\Http\Controllers\ReviewController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

// Tours
Route::prefix('tours')->name('front.tours.')->group(function () {
    Route::get('/', [FrontTourController::class, 'index'])->name('index');
    Route::get('/{slug}', [FrontTourController::class, 'show'])->name('show');
    Route::post('/{slug}/reserve', [FrontTourController::class, 'reserve'])->name('reserve');
    Route::post('/{slug}/leave-review', [FrontTourController::class, 'leaveReview'])->name('leaveReview');
});

// Activities
Route::prefix('activities')->name('front.activities.')->group(function () {
    Route::get('/', [FrontActivityController::class, 'index'])->name('index');
    Route::get('/{slug}', [FrontActivityController::class, 'show'])->name('show');
    Route::post('/{slug}/reserve', [FrontActivityController::class, 'reserve'])->name('reserve');
    Route::post('/{slug}/leave-review', [FrontActivityController::class, 'leaveReview'])->name('leaveReview');
});

// Trekking
Route::prefix('trekking')->name('front.trekking.')->group(function () {
    Route::get('/', [FrontTrekkingController::class, 'index'])->name('index');
    Route::get('/{slug}', [FrontTrekkingController::class, 'show'])->name('show');
    Route::post('/{slug}/reserve', [FrontTrekkingController::class, 'reserve'])->name('reserve');
    Route::post('/{slug}/leave-review', [FrontTrekkingController::class, 'leaveReview'])->name('leaveReview');
});


Route::post('/review/{review}/helpful', [ReviewController::class, 'markHelpful'])->name('review.helpful');
Route::post('/review/{review}/not-helpful', [ReviewController::class, 'markNotHelpful'])->name('review.notHelpful');

Route::view('/contact', 'front.contact')->name('front.contact');

Route::get('/{page}', [HomeController::class, 'pageView'])
    ->where('page', 'about|terms|privacy');

Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [FrontPostController::class, 'index'])->name('index');
    Route::get('/{slug}', [FrontPostController::class, 'show'])->name('show');
});

Route::resource('rating-categories', RatingCategoryController::class)
    ->middleware('auth')
    ->names('admin.rating-categories');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
    Route::get('/locations/{location}', [LocationController::class, 'show'])->name('locations.show');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'tour-categories' => TourCategoryController::class,
        'tours' => AdminTourController::class,
        'locations' => AdminLocationController::class,
        'activity-categories' => ActivityCategoryController::class,
        'activities' => ActivityController::class,
        'trekking-categories' => TrekkingCategoryController::class,
        'trekking' => TrekkingController::class,
        'blog-categories' => BlogCategoryController::class,
        'posts' => AdminPostController::class,
        'tags' => TagController::class,
        'special-offers' => SpecialOfferController::class,
    ]);
});
