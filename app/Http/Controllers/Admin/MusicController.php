<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Owenoj\LaravelGetId3\GetId3;

class MusicController extends Controller
{

    public function index(Album $album)
    {
        return view('admin.musics.index', [
            'album' => $album,
        ]);
    }

    public function create(Album $album)
    {
        return view('admin.musics.create', [
            'album' => $album
        ]);
    }

    public function store(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:mp3',
        ]);
        $music = new GetId3(request()->file('file'));

        // dd($album->musics()->sum('duration'));

        Music::create([
            'title' => $request->title,
            'album_id' => $album->id,
            'file' => $request->file('file')->store('musics'),
            'duration' => $music->getPlaytimeSeconds(),
        ]);

        return redirect()->route('admin.albums.musics.index', [$album->id]);
    }

    public function show(Album $album, Music $music)
    {
        return view('admin.musics.index', [
            'album' => $album,
            'music' => $music,
        ]);
    }

    public function edit(Music $music)
    {
        return view('admin.musics.edit', [
            'music' => $music,
        ]);
    }

    public function update(Request $request, Music $music)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|mimes:mp3',
        ]);

        $music->title = $request->title;
        $music->file = $request->file('file')->store('musics');
        $music->save();

        return redirect()->route('admin.albums.musics.index', [$music->album_id]);
    }

    public function destroy(Music $music)
    {
        Storage::delete($music->file);
        $music->delete();

        return redirect()->route('admin.albums.musics.index', $music->album->id);
    }
}
