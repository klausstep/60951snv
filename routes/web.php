
<?php

use App\Http\Controllers\HouseViewController;
use App\Http\Controllers\FlatViewController;
use App\Http\Controllers\ResourceViewController;
use App\Http\Controllers\CounterViewController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\FlatServiceController;
use App\Http\Controllers\FlatCounterController;
use App\Http\Controllers\PaymentController;

// Существующие маршруты
Route::get('/houses', [HouseViewController::class, 'index']);
Route::get('/houses/{id}', [HouseViewController::class, 'show']);
Route::get('/flats', [FlatViewController::class, 'index']);
Route::get('/flats/{id}', [FlatViewController::class, 'show']);
Route::get('/resources', [ResourceViewController::class, 'index']);
Route::get('/resources/{id}', [ResourceViewController::class, 'show']);
Route::get('/counters', [CounterViewController::class, 'index']);
Route::get('/counters/{id}', [CounterViewController::class, 'show']);
Route::get('/flats/{id}/counters', [FlatCounterController::class, 'show']);
Route::get('/payments', [PaymentController::class, 'index']);
Route::get('/flats/{id}/payments', [PaymentController::class, 'show']);

// Новые маршруты для связи многие-ко-многим
Route::get('/services', [ServiceController::class, 'index']);
Route::get('/services/{id}', [ServiceController::class, 'show']);
Route::get('/flats/{id}/services', [FlatServiceController::class, 'show']);

// Главная страница
Route::get('/', function () {
    return view('welcome');
});
