<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\LawyerController;
use App\Http\Controllers\WorkController;
use App\Models\Lawyer;
use App\Models\Library;
use App\Models\Work;

Route::get('/', function () {
    $lawyers = Lawyer::latest()->paginate(12);
    return view('welcome', compact('lawyers'));
});

Route::get('/aamal', function () {
    $works = Work::latest()->get();

    return view('aamal', compact('works'));
})->name('aamal');

Route::get('/library', function () {
    $libraries = Library::latest()->get();
    return view('library', compact('libraries'));
})->name('library');

Route::get('/dashboard', function () {
    $lawyers = Lawyer::count();
    $works = Work::count();
    $libraries = Library::count();

    return view('dashboard', compact(
        'lawyers',
        'works',
        'libraries'
    ));
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('libraries', LibraryController::class);
    Route::resource('lawyers', LawyerController::class);
    Route::resource('works', WorkController::class);
});

require __DIR__ . '/auth.php';
