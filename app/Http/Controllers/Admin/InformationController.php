<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Information;

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
    
    public function AllInformation() {
        $result = Information::all();
        return view('backend.information.all_information', compact('result'));
    }

}
