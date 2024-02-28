<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
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
// routes/web.php




// Route::get('/', function () {
//     return view('welcome', [EventController::class, 'welcome']);
// });
Route::get('/', [EventController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');

//  creating a new event
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');

// Store a newly created event in the database
Route::post('/events', [EventController::class, 'store'])->name('events.store');

// Show the details of a specific event
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');

// Show the form for editing an existing event
Route::get('/events/{id}/edit', [EventController::class, 'edit'])->name('events.edit');

// Update the specified event in the database
Route::put('/events/{id}', [EventController::class, 'update'])->name('events.update');

// Remove the specified event from the database
Route::delete('/events/{id}', [EventController::class, 'destroy'])->name('events.destroy');

// subscriber
Route::post('/subscribe', [EventController::class, 'subscribe'])->name('subscribe');

//Reservation Routes
Route::post('/reservations', [ReservationController::class ,'store'])->name('reservations.store');
Route::get('/user/reservations', [ReservationController::class ,'showUserReservations'])->name('reservations');



require __DIR__.'/auth.php';
