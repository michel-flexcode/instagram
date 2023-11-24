<?php

use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomepageController::class, 'index']);

Route::middleware(['auth', 'verified'])->get('/feed', [FeedController::class, 'feed'])->name('feed');

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class)->except(['index', 'show']);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
});

// // Code rajouté personnel attention NE FONCTIONNE PAS
// Route::get('/post', [FeedController::class, 'index'])->name('feed.index');
// Route::get('/posts/{id}', [FeedController::class, 'show'])->name('feed.show');

require __DIR__ . '/auth.php';
