<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function playlist()
    {
        return view('site.playlist');
    }
}
