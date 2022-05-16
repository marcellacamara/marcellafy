<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\MusicController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AlbumController as UserAlbumController;
use App\Http\Controllers\User\MusicController as UserMusicController;
use App\Http\Controllers\User\PlaylistController as UserPlaylistController;
use App\Models\Artist;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('albums.musics', MusicController::class)->shallow();
    Route::resource('artists.albums', AlbumController::class)->shallow();
    Route::resource('artists', ArtistController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('artists.albums', UserAlbumController::class);
    Route::resource('albums.musics', UserMusicController::class);
    Route::resource('playlists', UserPlaylistController::class);
    Route::resource('profile', ProfileController::class);
});

Route::get('/login', function () {
    return 'login';
})->name('login');

Route::fallback(function () {
    echo 'ERROR 404. Page not found. <br> <a href="/">Go to home</a>';
});

Route::get('/user', [ProfileController::class, 'edit'])->name('user');
Route::put('/user', [ProfileController::class, 'update'])->name('user.update');
// Route::get('/playlists', [PlaylistController::class, 'playlist']);

Route::get('/', [PrincipalController::class, 'index'])->name('principal');

Route::get('/dashboard', function () {
    $artists = Artist::all();
    return view('dashboard', compact('artists'));
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
