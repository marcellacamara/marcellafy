<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index(Artist $artist)
    {
        return view('user.albums.index', [
            'artist' => $artist,
            'albums' => $artist->albums,
        ]);
    }
}
