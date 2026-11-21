<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TestMenuController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/home', function () {
    return view('home');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('dashboard', function () {
        return redirect()->route('students.index');
    })->name('dashboard');

    Route::get('messages', [ContactController::class, 'getMessages']);

    Route::middleware(['admin'])->group(function () {

        Route::resource('crud', StudentController::class)
            ->except(['show'])
            ->parameters(['crud' => 'diak']);

        Route::get('/students', [StudentController::class, 'index'])
            ->name('students.index');

        Route::prefix('students')->group(function () {
            Route::get('/data', [StudentController::class, 'apiIndex'])->name('students.data');
            Route::post('/', [StudentController::class, 'apiStore'])->name('students.store');
            Route::put('/{diak}', [StudentController::class, 'apiUpdate'])->name('students.update');
            Route::delete('/{diak}', [StudentController::class, 'apiDestroy'])->name('students.destroy');
        });
    });
});

Route::get('contact', function () {
    return view('contact');
});

Route::post('contact', [ContactController::class, 'store']);

Route::get('gradebook', [DatabaseController::class, 'getDatas']);

Route::get('stats', [ChartController::class, 'getDatas']);

Route::get('test-menu', [TestMenuController::class, 'index'])->name('test-menu.index');
Route::post('test-menu/calculate', [TestMenuController::class, 'calculate'])->name('test-menu.calculate');

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';