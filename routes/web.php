<?php

use App\Models\About;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [HomeController::class, 'home']);
Route::get('/about-us', [AboutController::class, 'index']);
Route::get('/menu', [MenuController::class, 'index']);
Route::get('/team', [TeamController::class, 'index']);
Route::get('/reservation', [ReservationController::class, 'index']);

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

    // About
    Route::get('/admin/about', [AboutController::class, 'view'])->name('admin.about');
    Route::get('/admin/about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('/admin/about', [AboutController::class, 'store'])->name('about.store');
    Route::get('/admin/about/{id}/edit', [AboutController::class, 'edit'])->name('about.edit');
    Route::put('/admin/about/{id}', [AboutController::class, 'update'])->name('about.update');
    Route::delete('/about/{id}', [AboutController::class, 'destroy'])->name('about.destroy');

    //Team
    Route::get('/admin/team', [TeamController::class, 'view'])->name('admin.team');
    Route::get('/admin/team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('/admin/team', [TeamController::class, 'store'])->name('team.store');
    Route::get('/admin/team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('/admin/team/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/admin/team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

    //Reservation
    Route::post('/reservation', [ReservationController::class, 'storeClient'])->name('reservation');
    Route::get('/admin/reservation', [ReservationController::class, 'view'])->name('admin.reservation');
    Route::get('/admin/reservation/create', [ReservationController::class, 'create'])->name('reservation.create');
    Route::post('/admin/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::get('/admin/reservation/{id}/edit', [ReservationController::class, 'edit'])->name('reservation.edit');
    Route::put('/admin/reservation/{id}', [ReservationController::class, 'update'])->name('reservation.update');
    Route::delete('/admin/reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

    //Menu
    Route::get('/admin/menu', [MenuController::class, 'view'])->name('admin.menu');
    Route::get('/admin/menu/create', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/admin/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/admin/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::put('/admin/menu/{id}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/admin/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');
    
    // Settings
    Route::get('/admin/settings', [SettingsController::class, 'index'])->name('admin.settings');
});

Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
