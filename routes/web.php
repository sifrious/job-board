<?php

use App\Http\Controllers\AboutMembershipController;
use App\Http\Controllers\AboutPricingController;
use App\Http\Controllers\DashboardRoutingController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\LoginPromptController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserDraftsController;
use App\Http\Controllers\UserJobsController;
use App\Http\Controllers\UserListingController;
use App\Models\UserLeadsController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return inertia('Home', [
        'user' => Auth::user(),
    ]);
});

Route::get('/prompt', [LoginPromptController::class, 'index'])->name('prompt');

Route::get('/jobs', [JobController::class, 'index']);

Route::get('/about/membership', AboutMembershipController::class)->name('membership');
Route::get('/about/pricing', AboutPricingController::class)->name('pricing');

Route::get('/dashboard', DashboardRoutingController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/job/new', [ListingController::class, 'create'])->name('listing.create');
    Route::post('/job/new', [ListingController::class, 'store'])->name('listing.store');
    
    Route::get('/user/jobs', [UserJobsController::class, 'index'])->name('userjobs.index');
    Route::get('/user/listings', [UserListingController::class, 'index'])->name('userlistings.index');
    Route::get('/user/drafts', [UserDraftsController::class, 'index'])->name('userdrafts.index');
    Route::get('/user/leads', [UserLeadsController::class, 'index'])->name('userleads.index');
});

require __DIR__ . '/auth.php';
