<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::resource('artists.albums', AlbumController::class)->shallow();

Route::resource('artists', ArtistController::class);

Route::resource('albums.musics', MusicController::class)->shallow();



Route::get('/users', [UserController::class, 'user']);

Route::get('/playlists', [PlaylistController::class, 'playlist']);

Route::get('/musics', [MusicController::class, 'music']);

//Route::get('/albums', [AlbumController::class, 'album']);

// Route::get('/artist/{id}', [ArtistController::class, 'show']);

// Route::get('/artist', [ArtistController::class, 'index']);

Route::get('/', [PrincipalController::class, 'principal']);
