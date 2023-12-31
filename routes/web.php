<?php

// use App\Http\Controllers\FeedController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'index']);

Route::middleware(['auth', 'verified'])->group(function () {
    //Les routes sont TOUTES incluses sauf INDEX SHOW
    Route::resource('posts', PostController::class)->except(['index', 'show']);

    // Les routes ci-dessous sont incluses en dernier, ça évite quelques problèmes
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');

    //test
    Route::post('/posts/{post}/comments', [PostController::class, 'addComment'])->name('posts.comments.add');
    //like
    Route::post('/posts/{post}/like', [PostController::class, 'like'])->name('posts.like');
    Route::delete('/posts/{post}/unlike', [PostController::class, 'unlike'])->name('posts.unlike');

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');

    // Public profiles
    Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');

    // Profile  Follows
    Route::post(
        '/profile/{user}/follow',
        [ProfileController::class, 'follow']
    )->name('profile.follow');
    Route::post('/profile/{user}/unfollow', [ProfileController::class, 'unfollow'])->name('profile.unfollow');
});


require __DIR__ . '/auth.php';
