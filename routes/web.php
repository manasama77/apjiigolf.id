<?php

use App\Http\Controllers\AdminApjiiTournamentController;
use App\Http\Controllers\ApjiiTournamentController;
use App\Http\Controllers\CountController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventLocationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MasterLocationController;
use App\Http\Controllers\PlayerManagementController;
use App\Http\Controllers\PlayerScoreController;
use App\Http\Controllers\PromoCodeController;
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

Route::get('/', [LandingController::class, 'index'])->name('home');
Route::get('/register', [ApjiiTournamentController::class, 'index'])->name('register_index');
Route::post('/register', [ApjiiTournamentController::class, 'store'])->name('register_store');
Route::get('/register/check', [ApjiiTournamentController::class, 'check'])->name('register_check');
Route::post('/register/check', [ApjiiTournamentController::class, 'find'])->name('register_find');
Route::get('/register/status/{id}', [ApjiiTournamentController::class, 'status'])->name('register_status');
Route::get('/register/show/{id}', [ApjiiTournamentController::class, 'show'])->name('register_show');
Route::get('/register/success/{id}', [ApjiiTournamentController::class, 'success'])->name('register_success');
Route::get('/register/cancel/{id}', [ApjiiTournamentController::class, 'cancel'])->name('register_cancel');
Route::get('/download/invoice/{invoice_number}', [ApjiiTournamentController::class, 'download_invoice'])->name('register_download_invoice');
Route::get('/download/eticket/{invoice_number}', [ApjiiTournamentController::class, 'download'])->name('register_download_eticket');
Route::get('/register/table/success/{username}/{password}', [ApjiiTournamentController::class, 'table_success']);
Route::get('/register/table/expired/{username}/{password}', [ApjiiTournamentController::class, 'table_expired']);
Route::get('/register/promo-code/{username}/{password}', [ApjiiTournamentController::class, 'promo_code']);
Route::get('/test', [ApjiiTournamentController::class, 'test']);

// Route::get('/check', [LandingController::class, 'register_check'])->name('register_check');
Route::get('/error', [LandingController::class, 'register_error'])->name('register_error');
Route::get('/thumb', [LandingController::class, 'thumb']);
Route::get('/ori', [LandingController::class, 'ori']);

Route::get('/2024/gobar-6', [LandingController::class, 'gobar_6'])->name('gobar-6');
Route::get('/2024/gobar-5', [LandingController::class, 'gobar_5'])->name('gobar-5');
Route::get('/2024/gobar-pga-series-1', [LandingController::class, 'gobar_pga_series_1'])->name('gobar-pga-series-1');
Route::get('/gobar-3-5', [LandingController::class, 'gobar_3_5'])->name('gobar_3_5');
Route::get('/gobar-3-4', [LandingController::class, 'gobar_3_4'])->name('gobar_3_4');
Route::get('/gobar-3-3', [LandingController::class, 'gobar_3_3'])->name('gobar_3_3');
Route::get('/gobar-3-2', [LandingController::class, 'gobar_3_2'])->name('gobar_3_2');
Route::get('/gobar-3-1', [LandingController::class, 'gobar_3_1'])->name('gobar_3_1');
Route::get('/gobar-2', [LandingController::class, 'gobar_2'])->name('gobar_2');
Route::get('/gobar-1', [LandingController::class, 'gobar_1'])->name('gobar_1');
Route::get('/gobar-0', [LandingController::class, 'gobar_0'])->name('gobar_0');
Route::get('/apjii-golf-6', [LandingController::class, 'apjii_golf_6'])->name('apjii_golf_6');
Route::get('/apjii-golf-5', [LandingController::class, 'apjii_golf_5'])->name('apjii_golf_5');

Route::get('/standings', [LandingController::class, 'standings'])->name('standings');
Route::get('/pairing', [LandingController::class, 'pairing'])->name('pairing');
Route::get('/player/event/history/{player_id}', [LandingController::class, 'player_event_history'])->name('player.event.history');
Route::get('/player/event/history/score/{player_histories_id}', [LandingController::class, 'player_event_history_score'])->name('player.event.history.score');

Route::get('/undian', [LandingController::class, 'undian'])->name('undian');
Route::get('/undian_winner', [LandingController::class, 'undian_winner'])->name('undian.winner');
Route::get('/undian_peserta', [LandingController::class, 'undian_peserta'])->name('undian.peserta');
Route::post('/undian_store', [LandingController::class, 'undian_store'])->name('undian.store');

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

    Route::get('/tournament', [AdminApjiiTournamentController::class, 'index'])->name('admin.tournament');
    Route::get('/tournament/checkin', [AdminApjiiTournamentController::class, 'checkin'])->name('admin.tournament.checkin');
    Route::post('/tournament/checkin/store', [AdminApjiiTournamentController::class, 'checkin_store'])->name('admin.tournament.checkin.store');
    Route::get('/tournament/checkin/get_player_name', [AdminApjiiTournamentController::class, 'get_player_name'])->name('admin.tournament.get_player_name');

    Route::resource('/promo-code', PromoCodeController::class)->names([
        'index'   => 'admin.promo_code',
        'create'  => 'admin.promo_code.create',
        'store'   => 'admin.promo_code.store',
        'edit'    => 'admin.promo_code.edit',
        'update'  => 'admin.promo_code.update',
        'destroy' => 'admin.promo_code.destroy',
    ]);

    Route::get('/register/internal', [ApjiiTournamentController::class, 'index_internal'])->name('register_internal_index');
    Route::post('/register/internal', [ApjiiTournamentController::class, 'store_internal'])->name('register_internal_store');
});

Auth::routes([
    'register' => false,
    'reset'    => false,
    'verify'   => false,
]);


Route::get('/pga-in-action', function () {
    return redirect('https://drive.google.com/drive/folders/1_uOFgGNxd7gVACKvlojMqXaSES2SdsAb?usp=sharing');
});
