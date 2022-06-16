<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Staff;
use Illuminate\Http\Request;

class dashboardAssignProjectController extends Controller
{
    public function index() {
        $staffs = Staff::with('projects')->get();
        return view('dashboard.dashboardProjects.project_assign',compact('staffs'));
    }

    public function create() {
        $projects = Project::all();
        $staffs = Staff::all();
        return view('dashboard.dashboardProjects.assign_project_staff', compact('projects','staffs'));
    }

    public function save(Request $request) {
        $staff = Staff::find($request->staff_id);
        $project = Project::find($request->project_id);

        $staff->projects()->syncWithoutDetaching($project->id);
        return redirect()->route('project.assign')->with('success',' Successfully assign project to the satff' );
    }

}
