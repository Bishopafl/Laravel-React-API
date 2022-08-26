<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePageEtc;
use Illuminate\Http\Request;

class HomePageEtcController extends Controller
{
    public function selectTotalHome() {
        $result = HomePageEtc::select('total_hours_coding', 'total_github_repos', 'total_cups_water')->get();
        return $result;
    }

    public function selectVideo() {
        $results = HomePageEtc::select('video_description', 'video_url')->get();
        return $results;
    }

    public function selectTech() {
        $results = HomePageEtc::select('tech_description')->get();
        return $results;
    }

    public function selectHomeTitleAndSubtitle() {
        $results = HomePageEtc::select('home_title', 'home_subtitle')->get();
        return $results;
    }
}
