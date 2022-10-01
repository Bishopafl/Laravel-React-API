<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function onAllSelect() {
        $results = Artwork::all();
        return $results;
    }

    public function AllArtworks() {
        $artwork = Artwork::all();
        return view('backend.artwork.all_artwork', compact('artwork'));
    }
}
