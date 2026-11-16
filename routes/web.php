<?php

use Illuminate\Database\Console\DatabaseInspectionCommand;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Middleware\Auth2;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\StudentController;

Route::get('/', function () {return Inertia::render('welcome');})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {return Inertia::render('dashboard');})->name('dashboard');
    Route::get('messages', [ContactController::class, 'getMessages']);
    Route::get('admin', 'App\Http\Controllers\AdminController@adminPage');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';

Route::get('exercise1', function () { return view('view1'); });
Route::get('home', function () { return view('home'); });
Route::get('contact', function () { return view('contact'); });
Route::post('contact', [ContactController::class, 'store']);
Route::get('gradebook', [DatabaseController::class, 'getDatas']);
Route::get('stats', [ChartController::class, 'getDatas']);
Route::resource('crud', StudentController::class)->parameters([
    'crud' => 'diak'
]);