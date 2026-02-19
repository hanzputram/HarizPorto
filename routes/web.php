<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Models\Portfolio;
use App\Models\Review;
use App\Models\Pricing;
use App\Models\Setting;
use App\Models\Faq;
use App\Models\Stat;
use App\Models\Workflow;
use App\Models\Capability;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    $portfolios = Portfolio::latest()->get();
    $reviews = Review::latest()->get();
    $pricings = Pricing::all();
    $faqs = Faq::all();
    $stats = Stat::all();
    $workflows = Workflow::orderBy('order')->get();
    $capabilities = Capability::orderBy('order')->get();
    $settings = Setting::pluck('value', 'key');
    return view('welcome', compact('portfolios', 'reviews', 'pricings', 'settings', 'faqs', 'stats', 'workflows', 'capabilities'));
});

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/portfolio', function () {
    $portfolios = Portfolio::latest()->get();
    $settings = Setting::pluck('value', 'key');
    return view('portfolio.index', compact('portfolios', 'settings'));
})->name('portfolio.index');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Routes
Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::post('/portfolio', [AdminController::class, 'storePortfolio']);
    Route::put('/portfolio/{id}', [AdminController::class, 'updatePortfolio']);
    Route::delete('/portfolio/{id}', [AdminController::class, 'deletePortfolio']);
    Route::post('/pricing', [AdminController::class, 'storePricing']); // To be added in controller
    Route::put('/pricing/{id}', [AdminController::class, 'updatePricing']);
    Route::delete('/pricing/{id}', [AdminController::class, 'deletePricing']);
    Route::post('/settings', [AdminController::class, 'updateSettings']);
    Route::post('/review', [AdminController::class, 'storeReview']);
    Route::put('/review/{id}', [AdminController::class, 'updateReview']);
    Route::delete('/review/{id}', [AdminController::class, 'deleteReview']);
    Route::post('/faq', [AdminController::class, 'storeFaq']);
    Route::put('/faq/{id}', [AdminController::class, 'updateFaq']);
    Route::delete('/faq/{id}', [AdminController::class, 'deleteFaq']);
    Route::post('/stat', [AdminController::class, 'storeStat']);
    Route::put('/stat/{id}', [AdminController::class, 'updateStat']);
    Route::delete('/stat/{id}', [AdminController::class, 'deleteStat']);
    Route::post('/workflow', [AdminController::class, 'storeWorkflow']);
    Route::put('/workflow/{id}', [AdminController::class, 'updateWorkflow']);
    Route::delete('/workflow/{id}', [AdminController::class, 'deleteWorkflow']);
    Route::post('/capability', [AdminController::class, 'storeCapability']);
    Route::put('/capability/{id}', [AdminController::class, 'updateCapability']);
    Route::delete('/capability/{id}', [AdminController::class, 'deleteCapability']);
});
