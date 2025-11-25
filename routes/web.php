<?php

use App\Http\Controllers\FlatViewController;
use App\Http\Controllers\HouseViewController;
use App\Http\Controllers\ResourceViewController;
use App\Http\Controllers\CounterViewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FlatServiceController;
use App\Http\Controllers\FlatCounterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

// ========== ПУБЛИЧНЫЕ МАРШРУТЫ ==========
// Главная страница
Route::get('/', function () {
    return view('welcome');
});
// Страница ошибок закомментировал, т.к. error.blade.php теперь компонент, а не страница
//Route::get('/error', function () {
//    return view('error', ['message' => session('message')]);
//});
// Аутентификация (вход)
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/auth', [LoginController::class, 'authenticate']);

// ========== ЗАЩИЩЕННЫЕ МАРШРУТЫ ==========
Route::middleware(['auth'])->group(function () {

    // Выход из системы
    Route::get('/logout', [LoginController::class, 'logout']);

    // ========== FLATS (КВАРТИРЫ) ==========
    Route::get('/flats/create', [FlatViewController::class, 'create'])->name('flats.create');
    Route::get('/flats/{id}/edit', [FlatViewController::class, 'edit'])->name('flats.edit');
    Route::get('/flats/{id}/counters', [FlatCounterController::class, 'show']);
    Route::get('/flats/{id}/services', [FlatServiceController::class, 'show']);
    Route::get('/flats/{id}/payments', [PaymentController::class, 'show']);
    Route::get('/flats/{id}', [FlatViewController::class, 'show'])->name('flats.show');
    Route::get('/flats', [FlatViewController::class, 'index'])->name('flats.index');
    Route::post('/flats', [FlatViewController::class, 'store'])->name('flats.store');
    Route::put('/flats/{id}', [FlatViewController::class, 'update'])->name('flats.update');
    Route::delete('/flats/{id}', [FlatViewController::class, 'destroy'])->name('flats.destroy');

    // ========== HOUSES (ДОМА) ==========
    Route::get('/houses', [HouseViewController::class, 'index']);
    Route::get('/houses/{id}', [HouseViewController::class, 'show']);

    // ========== RESOURCES (РЕСУРСЫ) ==========
    Route::get('/resources', [ResourceViewController::class, 'index']);
    Route::get('/resources/{id}', [ResourceViewController::class, 'show']);

    // ========== COUNTERS (СЧЕТЧИКИ) ==========
    Route::get('/counters', [CounterViewController::class, 'index']);
    Route::get('/counters/{id}', [CounterViewController::class, 'show']);

    // ========== SERVICES (УСЛУГИ) ==========
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/services/{id}', [ServiceController::class, 'show']);

    // ========== PAYMENTS (ПЛАТЕЖИ) ==========
    Route::get('/payments/{id}/edit', [PaymentController::class, 'edit']);
    Route::put('/payments/{id}', [PaymentController::class, 'update']);
    Route::delete('/payments/{id}', [PaymentController::class, 'destroy']);
    Route::get('/payments', [PaymentController::class, 'index']);
    Route::get('/payments/{id}', [PaymentController::class, 'show']);
});
