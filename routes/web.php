<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TheModelController;
use App\Http\Controllers\DesignController;
use App\Http\Controllers\AnalyticsController;
use App\Http\Controllers\DashboardController;

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
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::middleware(['auth'])->group(function () {
Route::resource('user', UserController::class);
Route::resource('the_model', TheModelController::class);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('design_index', [DesignController::class, 'index'])->name('design_index');
Route::get('design_show/{id}', [DesignController::class, 'modelShow'])->name('design_show');
Route::get('model_qr', [TheModelController::class, 'modelQr'])->name('model_qr');

Route::get('analytics_index', [AnalyticsController::class, 'index'])->name('analytics_index');
Route::post('analytics_index', [AnalyticsController::class, 'index'])->name('analytics_index');

Route::resource('settings', SettingsController::class);
Route::post('/settings/{id}/updateEmail', [SettingsController::class, 'updateEmail'])->name('updateEmail');
Route::post('/settings/{id}/updatePassword', [SettingsController::class, 'updatePassword'])->name('updatePassword');

});
Route::get('model/{id}', [TheModelController::class, 'modelUrl'])->name('model');


require __DIR__.'/auth.php';
