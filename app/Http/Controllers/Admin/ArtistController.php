<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtistController extends Controller
{

    public function index()
    {
        return view('admin.artists.index', [
            'artists' => Artist::all()
        ]);
    }

    public function create()
    {
        return view('admin.artists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'avatar' => 'required|image',
        ]);

        Artist::create([
            'name' => $request->name,
            'avatar' => $request->file('avatar')->store('images/artists'),
        ]);

        return redirect()->route('admin.artists.index');
    }

    public function show(Artist $artist)
    {
        return view('admin.artists.index', [
            'artist' => $artist
        ]);
    }

    public function edit(Artist $artist)
    {
        return view('admin.artists.edit', [
            'artist' => $artist
        ]);
    }

    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'name' => 'required',
            'avatar' => 'required|image',
        ]);

        $artist->name = $request->name;
        $artist->avatar = $request->file('avatar')->store('images/artists');
        $artist->save();

        return redirect()->route('admin.artists.index');
    }

    public function destroy(Artist $artist)
    {
        if ((bool)$artist->albums->count()) {
            return redirect()->back()->with('error', "Não é possível deletar um artista que possui álbum(s) cadastrado(s)!");
        }

        Storage::delete($artist->avatar);
        $artist->delete();

        return redirect()->route('admin.artists.index');
    }
}
