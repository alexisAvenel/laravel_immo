<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MediasController;
use App\Http\Controllers\OptionsController;
use App\Http\Controllers\PropertiesController;
use App\Models\Property;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', [
        'properties' => Property::whereSold(false)->limit(10)->get(),
        'soldProperties' => Property::whereSold(true)->limit(10)->get(),
    ]);
})->name('home');
Route::prefix('/properties')->name('properties.')->controller(PropertiesController::class)->group(function () {
    Route::get('/{property}', 'show')->name('show');
    Route::post('/{property}/contact', 'contact')->name('contact');
});
Route::prefix('/')->controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->middleware('guest')->name('login');
    Route::post('/login', 'loginAction');
    Route::delete('/logout', 'logout')->middleware('auth')->name('logout');
    Route::prefix('/admin')->name('admin.')->middleware('auth')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::get('/logout', 'logoutAction')->name('logout');
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::prefix('/properties')->name('properties.')->controller(PropertiesController::class)->group(function () {
            Route::get('/', 'index')->name('list');
            Route::get('/new', 'create')->name('new');
            Route::post('/new', 'store');
            Route::get('/edit/{property}', 'edit')->name('edit');
            Route::patch('/edit/{property}', 'update');
            Route::delete('/delete/{property}', 'destroy')->name('delete');
        });
        Route::prefix('/media')->name('media.')->controller(MediasController::class)->group(function () {
            Route::delete('/delete/{media}', 'destroy')->name('delete');
        });
        Route::prefix('/options')->name('options.')->controller(OptionsController::class)->group(function () {
            Route::get('/', 'index')->name('list');
            Route::get('/new', 'create')->name('new');
            Route::post('/new', 'store');
            Route::get('/edit/{option}', 'edit')->name('edit');
            Route::patch('/edit/{option}', 'update');
            Route::delete('/delete/{option}', 'destroy')->name('delete');
        });
    });
});
