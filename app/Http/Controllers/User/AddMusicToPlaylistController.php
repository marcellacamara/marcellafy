<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\Request;

class AddMusicToPlaylistController extends Controller
{
    public function __invoke(Request $request, Playlist $playlist)
    {
        $request->validate([
            'music_id' => 'required',
        ]);

        $playlist->musics()->attach($request->music_id);

        return redirect()->route('playlists.index');
    }
}
