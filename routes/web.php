<?php

use App\Http\Controllers\DarkModeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReservationController;

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

Route::get('/dark-mode-switcher', DarkModeController::class)->name('dark_mode_switcher');

Route::get('/', function () {
	return view('welcome');
})->name('welcome');

Route::middleware(['tables.avalaible'])->group(function () {
	Route::redirect('/reservations', '/reservation/step-one')->name('reservation');
	Route::controller(ReservationController::class)->group(function () {
		Route::get('/reservations/step-one', 'stepOne')->name('reservations.step_one');
		Route::get('/reservations/step-two', 'stepTwo')->name('reservations.step_two');
		Route::post('/reservations', 'store')->name('reservations.store');
		Route::get('/reservations/success/{reservation}', 'success')->name('reservations.success');
		Route::get('/reservations', 'index')->name('reservations.index');
		Route::get('/reservations/create', 'create')->name('reservations.create');
	});
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
