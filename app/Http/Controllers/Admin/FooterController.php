<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Footer;

class FooterController extends Controller
{
    public function onAllSelect() {
        $result = Footer::all();
        return $result;
    }
}
