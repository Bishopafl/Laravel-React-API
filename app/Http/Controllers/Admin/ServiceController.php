<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Services;
use Illuminate\Http\Request;
use Intervention\Image\Image as Image;

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
        return view('backend.service.add_service' );
    }
    
    public function StoreServices(Request $request) {
        $request->validate([
            'service_name' => 'required',
            'service_description' => 'required',
            'service_logo' => 'required',
        ],[
            'service_name.required' => 'Input Service Name', //displays custom messages within validator
            'service_description.required' => 'Input Service Description',
        ]);

        $image = $request->file('service_logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(512, 512,)->save('upload/service_images/'.$name_gen);
        $save_url = 'http://127.0.0.1:8000/upload/service_images/'.$name_gen;

        Services::insert([
            'service_name' => $request->service_name,
            'service_description' => $request->service_description,
            'service_logo' => $save_url,
        ]);

        $notification = array(
            'message' => 'Service Data Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.services')->with($notification);
    }
    
    public function EditServices($id) {
        $serviceData = Services::findOrFail($id);
        return view('backend.service.edit_service', compact('serviceData'));
    }
    
    public function DeleteServices($id) {
        Services::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Service Data Deleted Successfully',
            'alert-type' => 'danger',
        );
        return redirect()->back()->with($notification);
    }
    
    public function UpdateServices(Request $request) {
        $service_id = $request->id;
        if ($request->file('service_logo')) {
            $image = $request->file('service_logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(512, 512)->save('upload/service_images/'.$name_gen);
            $save_url = 'http://127.0.0.1:8000/upload/service/'.$name_gen;

            Services::findOrFail($service_id)->update([
                'service_name' => $request->service_name,
                'service_description' => $request->service_description,
                'service_logo' => $save_url,
            ]);

            $notification = array(
                'message' => 'Service Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.services')->with($notification);
        } else {
            $service_id = $request->id;
            Services::findOrFail($service_id)->update([
                'service_name' => $request->service_name,
                'service_description' => $request->service_description,
            ]);

            $notification = array(
                'message' => 'Service Updated without Image Successfully',
                'alert-type' => 'success'
            );
            
            return redirect()->route('all.services')->with($notification);
        }
    }

}
