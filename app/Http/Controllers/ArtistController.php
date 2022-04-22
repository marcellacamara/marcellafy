<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    public function index()
    {
        return view('artists.index', [
            'artist' => Artist::all()
        ]);
    }

    public function create()
    {
        return view('artists.create');
    }

    public function store(Request $request)
    {
        Artist::create($request->all());
        return redirect()->route('admin.artists.index');
    }

    public function show(Artist $artist)
    {
        //
    }

    public function edit(Artist $artist)
    {
        //
    }

    public function update(Request $request, Artist $artist)
    {
        //
    }

    public function destroy(Artist $artist)
    {
        //
    }
}
