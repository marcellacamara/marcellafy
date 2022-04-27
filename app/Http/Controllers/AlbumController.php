<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{

    public function index(Artist $artist)
    {
        return view('albums.index', [
            'artist' => $artist
        ]);
    }

    public function create(Artist $artist)
    {
        return view('albums.create', [
            'artist' => $artist
        ]);
    }

    public function store(Request $request, Artist $artist)
    {
        Album::create([
            'title' => $request->title,
            'artist_id' => $artist->id,
            'cover_image' => $request->file('cover_image')->store('images/albums'),
            'duration' => 0,
            'year' => $request->year,
        ]);

        return redirect()->route('admin.artists.albums.index', $artist->id);
    }

    public function show(Album $album)
    {
        return view('albums.index', [
            'album' => $album,
        ]);
    }

    public function edit(Album $album)
    {
        return view('albums.edit', [
            'album' => $album,
        ]);
    }

    public function update(Request $request, Album $album)
    {
        $album->title = $request->title;
        $album->cover_image = $request->file('cover_image')->store('images/albums');
        $album->year = $request->year;
        $album->save();
    }

    public function destroy(Album $album)
    {
        Storage::delete($album->cover_image);
        $album->delete();

        return redirect()->route('admin.artists.albums.index', $album->artist->id);
    }
}
