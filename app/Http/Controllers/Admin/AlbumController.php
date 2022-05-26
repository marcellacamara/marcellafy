<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{

    public function index(Artist $artist)
    {
        return view('admin.albums.index', [
            'artist' => $artist,
        ]);
    }

    public function create(Artist $artist)
    {
        return view('admin.albums.create', [
            'artist' => $artist
        ]);
    }

    public function store(Request $request, Artist $artist)
    {
        $request->validate([
            'title' => 'required',
            'cover_image' => 'required|image',
        ]);

        Album::create([
            'title' => $request->title,
            'artist_id' => $artist->id,
            'cover_image' => $request->file('cover_image')->store('images/albums'),
            'year' => $request->year,
        ]);

        return redirect()->route('admin.artists.albums.index', $artist->id);
    }

    public function show(Album $album)
    {
        return view('admin.albums.index', [
            'album' => $album,
        ]);
    }

    public function edit(Album $album)
    {
        return view('admin.albums.edit', [
            'album' => $album,
        ]);
    }

    public function update(Request $request, Album $album)
    {
        $request->validate([
            'title' => 'required',
            'cover_image' => 'required|image',
        ]);

        $album->title = $request->title;
        $album->cover_image = $request->file('cover_image')->store('images/albums');
        $album->year = $request->year;
        $album->save();

        return redirect()->route('admin.artists.albums.index', $album->artist_id);
    }

    public function destroy(Album $album)
    {
        if ((bool)$album->musics->count()) {
            return redirect()->back()->withErrors("Não é possível deletar um álbum que possui música(s) cadastrada(s)!");
        }

        Storage::delete($album->cover_image);
        $album->delete();

        return redirect()->route('admin.artists.albums.index', $album->artist->id);
    }
}
