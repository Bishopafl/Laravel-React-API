<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;
use PhpParser\Node\Stmt\Return_;

class InformationController extends Controller
{
    public function onAllSelect() {
        $result = Information::all();
        return $result;
    }

    public function onAllRefund() {
        $result = Information::where('id', 1)->value('refund');
        return $result;
    }

    public function onAllTerms() {
        $result = Information::where('id', 1)->value('terms');
        return $result;
    }

    public function onAllPrivacy() {
        $result = Information::where('id', 1)->value('privacy');
        return $result;
    }

    public function onAllAbout() {
        $result = Information::where('id', 1)->value('about');
        return $result;
    }
    // Backend Admin Methods
    public function AllInformation() {
        $result = Information::all();
        return view('backend.information.all_information', compact('result'));
    }

    public function AddInformation() {
        return view('backend.information.add_information');
    }

    public function StoreInformation(Request $request) {
        Information::insert([
            'about' => $request->about,
            'refund' => $request->refund,
            'terms' => $request->terms,
            'privacy' => $request->privacy,
        ]);

        $notification = array(
            'message' => 'Information Data Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.information')->with($notification);
    }

    public function EditInformation($id) {
        $information = Information::findOrFail($id);
        return view('backend.information.edit_information', compact('information'));
    }

}
