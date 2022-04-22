<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use Illuminate\Http\Request;

class AlbumController extends Controller
{

    public function index(Artist $artist)
    {
        return view('site.album', [
            'albums' => $artist->albums()->get(),
            'artist' => $artist
        ]);
    }

    public function create(Artist $artist)
    {
        //
    }

    public function store(Request $request, Artist $artist)
    {
        //
    }

    public function show(Artist $artist, Album $album)
    {
        //
    }

    public function edit(Artist $artist, Album $album)
    {
        //
    }

    public function update(Request $request, Artist $artist, Album $album)
    {
        //
    }

    public function destroy(Artist $artist, Album $album)
    {
        //
    }
}
