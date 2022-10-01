<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use Image;

class ProjectController extends Controller
{
    public function onSelectThree() {
        $result = Projects::limit(3)->get();
        return $result;
    }

    public function onAllSelect() {
        $result = Projects::all();
        return $result;
    }

    public function allProjectDetails($projectId) {
        $id = $projectId;
        $result = Projects::where('id', $id)->get();
        return $result;
    }

    /**
     * Backend CRUD methods
     */
    
    public function AllProject() {
        $projects = Projects::all();
        return view('backend.project.all_project', compact('projects'));
    }
    
    public function AddProject() {
        return view('backend.project.add_project' );
    }
    
    public function StoreProject(Request $request) {
        $request->validate([
            'card_img' => 'required',
            'project_img' => 'required',
            'project_name' => 'required',
            'project_description' => 'required',
            'project_features' => 'required',
            'live_preview' => 'required',
        ],[
            'project_name.required' => 'Input project Name', //displays custom messages within validator
            'project_description.required' => 'Input project Description',
            'project_features.required' => 'Input project features as HTML',
            'live_preview.required' => 'Input full project URL',
        ]);

        try {
            $cardImage = $request->file('card_img');
            $projectImage = $request->file('project_img');

            $card_name_gen = hexdec(uniqid()).'.'.$cardImage->getClientOriginalExtension();
            Image::make($cardImage)->resize(350, 150)->save('upload/project_images/project_card_images/'.$card_name_gen);
            $card_save_url = 'http://127.0.0.1:8000/upload/project_images/project_card_images/'.$card_name_gen;

            $main_name_gen = hexdec(uniqid()).'.'.$projectImage->getClientOriginalExtension();
            Image::make($projectImage)->resize(512, 512)->save('upload/project_images/project_main_images/'.$main_name_gen);
            $main_save_url = 'http://127.0.0.1:8000/upload/project_images/project_main_images/'.$main_name_gen;

            Projects::insert([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'card_img' => $card_save_url,
                'project_img' => $main_save_url,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,
            ]);

            $notification = array(
                'message' => 'Project Data Inserted Successfully!',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.projects')->with($notification);
            
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
        
    }
    
    public function EditProject($id) {
        $projectData = Projects::findOrFail($id);
        return view('backend.project.edit_project', compact('projectData'));
    }
    
    public function DeleteProject($id) {
        Projects::findOrFail($id)->delete();

        $notification = array(
            'message' => 'project Data Deleted Successfully',
            'alert-type' => 'danger',
        );
        return redirect()->back()->with($notification);
    }
    
    public function UpdateProject(Request $request) {
        $project_id = $request->id;
        $original_card_img = Projects::findOrFail($project_id)->get('card_img')->first();
        $original_card_img = json_decode($original_card_img, true);

        $original_main_img = Projects::findOrFail($project_id)->get('project_img')->first();
        $main_image_decoded = json_decode($original_main_img, true);
        // dd($main_image_decoded['card_img']);
        // dd($original_main_img['project_img']);
        // dd($request->file('card_img'));
        try {
            $project_id = $request->id;
            $card_image = $request->file('card_img');
            $project_image = $request->file('project_img');

            if ($request->file('card_img') && !$original_card_img) {
                $card_name_gen = hexdec(uniqid()).'.'.$card_image->getClientOriginalExtension();
                Image::make($card_image)->resize(350, 150)->save('upload/project_images/project_card_images/'.$card_name_gen);
                $card_save_url = 'http://127.0.0.1:8000/upload/project_images/project_card_images/'.$card_name_gen;    
            } else {
                $card_save_url = $original_card_img;
            }

            if ($request->file('project_img') && !$original_main_img) {
                $main_name_gen = hexdec(uniqid()).'.'.$project_image->getClientOriginalExtension();
                Image::make($project_image)->resize(512, 512)->save('upload/project_images/project_main_images/'.$main_name_gen);
                $main_save_url = 'http://127.0.0.1:8000/upload/project_images/project_main_images/'.$main_name_gen;
            } else {
                $main_save_url = $original_main_img;
            }            

            Projects::findOrFail($project_id)->update([
                'project_name' => $request->project_name,
                'project_description' => $request->project_description,
                'card_img' => $card_save_url,
                'project_img' => $main_save_url,
                'project_features' => $request->project_features,
                'live_preview' => $request->live_preview,
            ]);

            $notification = array(
                'message' => 'Both Project Images and Data Updated Successfully',
                'alert-type' => 'success'
            );
            
            return redirect()->route('all.projects')->with($notification);
            
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function AllProjects() {
        $projects = Projects::all();
        return view('backend.project.all_projects', compact('projects'));
    }
}
