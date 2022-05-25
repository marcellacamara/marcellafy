<?php

use App\Http\Controllers\Admin\AlbumController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\MusicController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\AddMusicToPlaylistController;
use App\Http\Controllers\User\AlbumController as UserAlbumController;
use App\Http\Controllers\User\MusicController as UserMusicController;
use App\Http\Controllers\User\PlaylistController;
use App\Models\Artist;
use Illuminate\Support\Facades\Route;

Route::get('/', [PrincipalController::class, 'index'])->name('principal');

Route::get('/add-music/{playlist}', AddMusicToPlaylistController::class)->name('add-music');

Route::get('/login', function () {
    return 'login';
})->name('login');

Route::get('/dashboard', function () {
    $artists = Artist::all();
    return view('dashboard', compact('artists'));
})->middleware(['auth'])->name('dashboard');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('albums.musics', MusicController::class)->shallow();
    Route::resource('artists.albums', AlbumController::class)->shallow();
    Route::resource('artists', ArtistController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('user', [ProfileController::class, 'edit'])->name('user');
    Route::put('user', [ProfileController::class, 'update'])->name('user.update');
    Route::resource('artists.albums', UserAlbumController::class);
    Route::resource('albums.musics', UserMusicController::class);
    Route::resource('playlists', PlaylistController::class);
});

Route::fallback(function () {
    echo 'ERROR 404. Page not found. <br> <a href="/">Go to home</a>';
});

require __DIR__ . '/auth.php';
