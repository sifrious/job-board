<?php

use App\Http\Controllers\DashboardRoutingController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\LoginPromptController;
use App\Http\Controllers\ProfileController;
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
    $session_path = session('redirect_path');
    $session_info = session();
    dump($session_info);
    dump($session_path);
    dd();
    return Inertia::render('Welcome', [
        'user' => Auth::user() ? Auth::user()->id : -1,
        'failedSlackLogin' => false,
    ]);
});

Route::get('/welcome', [LoginPromptController::class, 'index'])->name('welcome');

Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/new', [JobController::class, 'create']);

Route::get('/dashboard', DashboardRoutingController::class)->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
