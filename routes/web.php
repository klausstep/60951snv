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

// Главная страница
Route::get('/', function () {
    return view('welcome');
});

// ========== FLATS (КВАРТИРЫ) - ВАЖЕН ПОРЯДОК! ==========
// Специфичные маршруты ПЕРВЫМИ
Route::get('/flats/create', [FlatViewController::class, 'create'])->name('flats.create');
Route::get('/flats/{id}/edit', [FlatViewController::class, 'edit'])->name('flats.edit');
Route::get('/flats/{id}/counters', [FlatCounterController::class, 'show']);
Route::get('/flats/{id}/services', [FlatServiceController::class, 'show']);
Route::get('/flats/{id}/payments', [PaymentController::class, 'show']);

// Общие маршруты ПОСЛЕДНИМИ
Route::get('/flats/{id}', [FlatViewController::class, 'show'])->name('flats.show');
Route::get('/flats', [FlatViewController::class, 'index'])->name('flats.index');

// Маршруты для действий (POST, PUT, DELETE)
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
Route::get('/payments', [PaymentController::class, 'index']);
// Route::get('/flats/{id}/payments' уже объявлен выше


