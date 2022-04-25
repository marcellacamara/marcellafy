<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtistController extends Controller
{

    public function index()
    {
        return view('artists.index', [
            'artists' => Artist::all()
        ]);
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        Artist::create([
            'name' => $request->name,
            'avatar' => $request->file('avatar')->store('images'),
        ]);

        return redirect()->route('admin.artists.index');
    }

    public function show(Artist $artist)
    {
        return view('artists.index', [
            'artist' => $artist
        ]);
    }

    public function edit(Artist $artist)
    {
        return view('artists.edit', [
            'artist' => $artist
        ]);
    }

    public function update(Request $request, Artist $artist)
    {
        $artist->name = $request->name;
        $artist->avatar = $request->file('avatar')->store('images');
        $artist->save();

        return redirect()->route('admin.artists.index');
    }

    public function destroy(Artist $artist)
    {
        $artist->delete();

        return redirect()->route('admin.artists.index');
    }
}
