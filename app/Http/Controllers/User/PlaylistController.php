<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        return view('user.playlists.index', [
            'playlists' => auth()->user()->playlists
        ]);
    }

    public function create()
    {
        return view('user.playlists.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        /** @var User */
        $user = auth()->user();
        $user->playlists()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('playlists.index');
    }

    public function edit(Playlist $playlist)
    {
        return view('user.playlists.edit', [
            'playlist' => $playlist
        ]);
    }

    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $playlist->update([
            'name' => $request->name,
        ]);

        return redirect()->route('playlists.index')->with('success', 'Playlist atualizada com sucesso!');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->back()->with('success', 'Playlist deletada com sucesso!');
    }
}
