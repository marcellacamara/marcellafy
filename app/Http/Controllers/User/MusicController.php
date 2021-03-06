<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    public function index(Album $album)
    {
        return view('user.musics.index', [
            'album' => $album,
            'playlists' => auth()->user()->playlists,
        ]);
    }
}
