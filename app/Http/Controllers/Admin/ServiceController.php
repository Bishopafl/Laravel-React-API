<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function serviceView() {
        $services = Services::latest()->get();
        return $services;
    }
    /**
     * Backend CRUD methods
     */
    
    public function AllServices() {
        $service = Services::all();
        return view('backend.service.all_service', compact('service'));
    }
    
    public function AddServices() {

    }
    
    public function StoreServices() {

    }
    
    public function EditServices() {

    }
    
    public function DeleteServices() {

    }
    
    public function UpdateServices() {

    }

}
