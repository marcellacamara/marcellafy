<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('albums.musics', MusicController::class)->shallow();
    Route::resource('artists.albums', AlbumController::class)->shallow();
    Route::resource('artists', ArtistController::class);
});

Route::get('/login', function () {
    return 'login';
})->name('login');

Route::fallback(function () {
    echo 'ERROR 404. Page not found. <br> <a href="/">Go to home</a>';
});

// Route::get('/users', [UserController::class, 'user']);
// Route::get('/playlists', [PlaylistController::class, 'playlist']);

Route::get('/', [PrincipalController::class, 'index'])->name('principal');

Route::get('/dashboard', function () {
    return view('site.dashboard-admin');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
