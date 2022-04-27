<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Music;
use Illuminate\Http\Request;

class MusicController extends Controller
{

    public function index(Album $album)
    {
        return view('musics.index', [
            'album' => $album,
        ]);
    }

    public function create(Album $album)
    {
        return view('musics.create', [
            'album' => $album
        ]);
    }

    public function store(Request $request, Album $album)
    {
        Music::create([
            'title' => $request->title,
            'album_id' => $album->id,
            'duration' => 0,
            'file' => $request->file('file')->store('music'),
            //Str::slug($album->artist->name) . '/' . Str::slug($album->title)),
        ]);

        return redirect()->route('admin.albums.musics.index', [$album->id]);
    }

    public function show(Album $album, Music $music)
    {
        //
    }

    public function edit(Music $music)
    {
        //
    }

    public function update(Request $request, Music $music)
    {
        //
    }

    public function destroy(Music $music)
    {
        //
    }
}
