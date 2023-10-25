<?php

use App\Http\Controllers\CountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventLocationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MasterLocationController;
use App\Http\Controllers\PlayerManagementController;
use App\Http\Controllers\PlayerScoreController;
use App\Http\Controllers\UserAdminController;

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

Route::get('/ty', [LandingController::class, 'ty'])->name('ty');
// Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/', [LandingController::class, 'ty'])->name('home');
Route::get('/pairing', [LandingController::class, 'pairing'])->name('pairing');
Route::get('/home', [LandingController::class, 'index'])->name('home');
Route::get('/player/event/history/{player_id}', [LandingController::class, 'player_event_history'])->name('player.event.history');
Route::get('/player/event/history/score/{player_histories_id}', [LandingController::class, 'player_event_history_score'])->name('player.event.history.score');


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/count_countan', [CountController::class, 'index'])->name('count_countan');

    Route::resource('/admin', UserAdminController::class)->names([
        'index'   => 'admin.admin',
        'create'  => 'admin.admin.create',
        'store'   => 'admin.admin.store',
        'edit'    => 'admin.admin.edit',
        'update'  => 'admin.admin.update',
        'destroy' => 'admin.admin.destroy',
    ]);
    Route::get('/admin/reset/{id}', [UserAdminController::class, 'reset'])->name('admin.admin.reset');
    Route::patch('/admin/reset/{id}', [UserAdminController::class, 'reset_password'])->name('admin.admin.reset_password');

    Route::resource('/master_location', MasterLocationController::class)->names([
        'index'   => 'admin.master_location',
        'create'  => 'admin.master_location.create',
        'store'   => 'admin.master_location.store',
        'edit'    => 'admin.master_location.edit',
        'update'  => 'admin.master_location.update',
        'destroy' => 'admin.master_location.destroy',
    ]);

    Route::resource('/event_location', EventLocationController::class)->names([
        'index'   => 'admin.event_location',
        'create'  => 'admin.event_location.create',
        'store'   => 'admin.event_location.store',
        'edit'    => 'admin.event_location.edit',
        'update'  => 'admin.event_location.update',
        'destroy' => 'admin.event_location.destroy',
    ]);

    Route::resource('/player_management', PlayerManagementController::class)->names([
        'index'   => 'admin.player_management',
        'create'  => 'admin.player_management.create',
        'store'   => 'admin.player_management.store',
        'edit'    => 'admin.player_management.edit',
        'update'  => 'admin.player_management.update',
        'destroy' => 'admin.player_management.destroy',
    ]);

    Route::resource('/player_score', PlayerScoreController::class)->names([
        'index'   => 'admin.player_score',
        'create'  => 'admin.player_score.create',
        'store'   => 'admin.player_score.store',
        'edit'    => 'admin.player_score.edit',
        'update'  => 'admin.player_score.update',
        'destroy' => 'admin.player_score.destroy',
    ]);
});

Auth::routes([
    'register' => false,
    'reset'    => false,
    'verify'   => false,
]);
