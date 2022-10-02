<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClientReview;

class ClientReviewController extends Controller
{
    public function onAllSelect() {
        $result = ClientReview::all();
        return $result;
    }

    public function AllReviews() {
        $review = ClientReview::all();
        return view('backend.review.all_review', compact('review'));
    }

    public function AddReviews() {
        return view('backend.review.add_review');
    }

    public function StoreReviews(Request $request) {
        $request->validate([
            'client_img' => 'required',
            'client_title' => 'required',
            'client_description' => 'required',
        ],[
            'client_img.required' => 'Input needs to be an image URL'
        ]);

        ClientReview::insert([
            'client_img' => $request->client_img,
            'client_title' => $request->client_title,
            'client_description' => $request->client_description,
        ]);

        $notification = array(
            'message' => 'Client Review Data Inserted Successfully',
            'alert-type' => 'success' 
        );
        return redirect()->route('all.reviews')->with($notification);
    }

    public function EditReviews($id) {
        $reviewData = ClientReview::findOrFail($id);
        return view('backend.review.edit_review', compact('reviewData'));
    }

    public function DeleteReviews($id) {
        ClientReview::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Client Review Data Deleted successfully',
            'alert-type' => 'danger'
        );
        return redirect()-> back()->with($notification);
    }

    public function UpdateReviews(Request $request) {
        $review_id = $request->id;
        ClientReview::findOrFail($review_id)->update([
            'client_img' => $request->client_img,
            'client_title' => $request->client_title,
            'client_description' => $request->client_description,
        ]);
        $notification = array(
            'message' => 'Client Review Data Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.reviews')->with($notification);
    }
}
