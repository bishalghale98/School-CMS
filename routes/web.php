<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AcademicsController;
use App\Http\Controllers\AdmissionsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DownloadsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TeachersController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::prefix('/about')->name('about.')->group(function () {
    Route::get('/', [AboutController::class, '__invoke'])->name('index');
    Route::get('/history', [AboutController::class, 'history'])->name('history');
    Route::get('/vision-mission', [AboutController::class, 'visionMission'])->name('vision-mission');
    Route::get('/committee', [AboutController::class, 'committee'])->name('committee');
});
Route::get('/academics', AcademicsController::class)->name('academics');
Route::get('/admissions', [AdmissionsController::class, 'index'])->name('admissions');
Route::post('/admissions', [AdmissionsController::class, 'store'])
    ->middleware('throttle:10,60')
    ->name('admissions.store');

Route::prefix('/notices')->name('notices.')->group(function () {
    Route::get('/', [NoticesController::class, 'index'])->name('index');
    Route::get('/{slug}', [NoticesController::class, 'show'])->name('show');
});

Route::prefix('/news')->name('news.')->group(function () {
    Route::get('/', [NewsController::class, 'index'])->name('index');
    Route::get('/{slug}', [NewsController::class, 'show'])->name('show');
});

Route::prefix('/events')->name('events.')->group(function () {
    Route::get('/', [EventsController::class, 'index'])->name('index');
    Route::get('/{slug}', [EventsController::class, 'show'])->name('show');
});

Route::prefix('/gallery')->name('gallery.')->group(function () {
    Route::get('/', [GalleryController::class, 'index'])->name('index');
    Route::get('/{slug}', [GalleryController::class, 'show'])->name('show');
});

Route::get('/teachers', TeachersController::class)->name('teachers');
Route::get('/facilities', FacilitiesController::class)->name('facilities');
Route::get('/downloads', [DownloadsController::class, '__invoke'])->name('downloads');
Route::get('/downloads/{download}/file', [DownloadsController::class, 'download'])->name('downloads.file');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])
    ->middleware('throttle:5,60')
    ->name('contact.store');
Route::get('/faq', FaqController::class)->name('faq');
Route::get('/search', SearchController::class)->name('search');

Route::get('/robots.txt', fn () => response()->view('pages.robots', ['host' => request()->getHost()])->header('Content-Type', 'text/plain'));
