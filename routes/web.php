<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Pricing;
use App\Models\Setting;
use App\Models\Faq;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    $portfolios = Portfolio::latest()->get();
    $reviews = Review::latest()->get();
    $pricings = Pricing::all();
    $faqs = Faq::all();
    $settings = Setting::pluck('value', 'key');
    return view('welcome', compact('portfolios', 'reviews', 'pricings', 'settings', 'faqs'));
});

Route::get('/portfolio', function () {
    $portfolios = Portfolio::latest()->get();
    return view('portfolio.index', compact('portfolios'));
})->name('portfolio.index');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/portfolio', [AdminController::class, 'storePortfolio']);
    Route::delete('/portfolio/{id}', [AdminController::class, 'deletePortfolio']);
    Route::post('/pricing', [AdminController::class, 'storePricing']); // To be added in controller
    Route::put('/pricing/{id}', [AdminController::class, 'updatePricing']);
    Route::delete('/pricing/{id}', [AdminController::class, 'deletePricing']);
    Route::post('/settings', [AdminController::class, 'updateSettings']);
    Route::post('/review', [AdminController::class, 'storeReview']);
    Route::delete('/review/{id}', [AdminController::class, 'deleteReview']);
    Route::post('/faq', [AdminController::class, 'storeFaq']);
    Route::delete('/faq/{id}', [AdminController::class, 'deleteFaq']);
});
