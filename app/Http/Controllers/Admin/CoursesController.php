<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    public function onSelectFour() {
        $result = Courses::limit(4)->get();
        return $result;
    }

    public function onSelectAll() {
        $result = Courses::all();
        return $result;
    }

    public function onSelectDetails($courseId) {
        $id = $courseId;
        $result = Courses::where('id', $id)->get();
        return $result;
    }

     /**
     * Backend CRUD methods
     */
    
    public function AllCourses() {
        $course = Courses::all();
        return view('backend.course.all_course', compact('course'));
    }
    
    public function AddCourses() {
        return view('backend.course.add_course' );
    }
    
    public function StoreCourses(Request $request) {
        $request->validate([
            'course_name' => 'required',
            'course_description' => 'required',
            'course_logo' => 'required',
        ],[
            'course_name.required' => 'Input course Name', //displays custom messages within validator
            'course_description.required' => 'Input course Description',
        ]);

        $image = $request->file('course_logo');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(512, 512,)->save('upload/course_images/'.$name_gen);
        $save_url = 'http://127.0.0.1:8000/upload/course_images/'.$name_gen;

        Courses::insert([
            'course_name' => $request->course_name,
            'course_description' => $request->course_description,
            'course_logo' => $save_url,
        ]);

        $notification = array(
            'message' => 'course Data Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.Courses')->with($notification);
    }
    
    public function EditCourses($id) {
        $courseData = Courses::findOrFail($id);
        return view('backend.course.edit_course', compact('courseData'));
    }
    
    public function DeleteCourses($id) {
        Courses::findOrFail($id)->delete();

        $notification = array(
            'message' => 'course Data Deleted Successfully',
            'alert-type' => 'danger',
        );
        return redirect()->back()->with($notification);
    }
    
    public function UpdateCourses(Request $request) {
        $course_id = $request->id;
        if ($request->file('small_img')) {
            $image = $request->file('small_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(512, 512)->save('upload/course_images/'.$name_gen);
            $save_url = 'http://127.0.0.1:8000/upload/course_images/'.$name_gen;

            Courses::findOrFail($course_id)->update([
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'small_img' => $save_url,
                'long_title' => $request->long_title,
                'long_description' => $request->long_description,
                'total_feature_one' => $request->total_feature_one,
                'total_feature_two' => $request->total_feature_two,
                'total_feature_three' => $request->total_feature_three,
                'total_feature_four' => $request->total_feature_four,
                'total_feature_five' => $request->total_feature_five,
                'all_features' => $request->all_features,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Course Data Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.courses')->with($notification);
        } else {
            $course_id = $request->id;
            Courses::findOrFail($course_id)->update([
                'short_title' => $request->short_title,
                'short_description' => $request->short_description,
                'long_title' => $request->long_title,
                'long_description' => $request->long_description,
                'total_feature_one' => $request->total_feature_one,
                'total_feature_two' => $request->total_feature_two,
                'total_feature_three' => $request->total_feature_three,
                'total_feature_four' => $request->total_feature_four,
                'total_feature_five' => $request->total_feature_five,
                'all_features' => $request->all_features,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Course Data Updated without Image',
                'alert-type' => 'success'
            );
            
            return redirect()->route('all.courses')->with($notification);
        }
    }
}
