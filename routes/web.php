<?php

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware(['tables.avalaible'])->group(function () {
	Route::redirect('/reservation', '/reservation/step-one')->name('reservation');
	Route::get('/reservation/step-one', [ReservationController::class, 'stepOne'])->name('reservation.step_one');
	Route::get('/reservation/step-two', [ReservationController::class, 'stepTwo'])->name('reservation.step_two');
	Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
	Route::get('/reservation/success/{reservation}', [ReservationController::class, 'success'])->name('reservation.success');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
