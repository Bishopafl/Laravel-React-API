<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Chart;

class ChartController extends Controller
{
    public function onAllSelect() {
        $result = Chart::all();
        return $result;
    } // end of method

    public function AllCharts() {
        $chart = Chart::all();
        return view('backend.chart.all_chart', compact('chart'));
    }

    public function AddCharts() {
        return view('backend.chart.add_chart');
    }

    public function StoreCharts(Request $request) {
        $request->validate([
            'subject_title' => 'required',
            'subject_knowledge' => 'required',
            'subject_total_knowledge' => 'required',
        ], [
            'subject_title.required' => 'Input title should not exceed 4 words',
            'subject_total_knowledge.required' => 'Input should be the maximum amount of knowledge',
        ]);

        Chart::insert([
            'subject_title' => $request->subject_title,
            'subject_knowledge' => $request->subject_knowledge,
            'subject_total_knowledge' => $request->subject_total_knowledge,
        ]);

        $notification = array(
            'message' => 'Chart Data inserted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('all.charts')->with($notification);
    }

    public function EditCharts($id) {
        $chartData = Chart::findOrFail($id);
        return view('backend.chart.edit_chart', compact('chartData'));
    }

    public function DeleteCharts($id) {
        Chart::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Chart Data Deleted Successfully',
            'alert-type' => 'danger'
        );
        return redirect()->back()->with($notification);
    }

    public function UpdateCharts(Request $request) {
        $chart_id = $request->id;

        Chart::findOrFail($chart_id)->update([
            'subject_title' => $request->subject_title,
            'subject_knowledge' => $request->subject_knowledge,
            'subject_total_knowledge' => $request->subject_total_knowledge
        ]);

        $notification = array(
            'message' => 'Chart Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.charts')->with($notification);
    }
}
