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

    public function AddArtworks() {
        return view('backend.artwork.add_artwork');
    }

    public function StoreArtworks(Request $request) {
        $request->validate([
            'artwork_name' => 'required',
            'artwork_path' => 'required',
            'width' => 'required|numeric',
            'height' => 'required|numeric',
        ], [
            'width.required' => 'Input Width should be a number only',
            'height.required' => 'Input Height should be a number only',
        ]);

        Artwork::insert([
            'artwork_name' => $request->artwork_name,
            'artwork_path' => $request->artwork_path,
            'width' => $request->width,
            'height' => $request->height,
        ]);

        $notification = array(
            'message' => 'Artwork Data was Inserted Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('all.artworks')->with($notification);
    }

    public function EditArtworks($id) {
        $artworkData = Artwork::findOrFail($id);
        return view('backend.artwork.edit_artwork', compact('artworkData'));
    }

    public function DeleteArtworks($id) {
        Artwork::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Artwork Data deteleted Successfully',
            'alert-type' => 'danger',
        );
        return redirect()->back()->with($notification);
    }

    public function UpdateArtworks(Request $request) {
        $artwork_id = $request->id;

        Artwork::findOrFail($artwork_id)->update([
            'artwork_name' => $request->artwork_name,
            'artwork_path' => $request->artwork_path,
            'width' => $request->width,
            'height' => $request->height,
        ]);
        
        $notification = array(
            'message' => 'Artwork Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.artworks')->with($notification);
    }
}
