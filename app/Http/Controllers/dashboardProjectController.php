<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use File;

class dashboardProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->simplePaginate(10);
        return view('dashboard.dashboardProjects.index',compact('projects'));
    }

    public function create()
    {
        return view('dashboard.dashboardProjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,png,jpg',
            'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm',
            ]);
        $project = new Project;
        $project->title = $request->title;
        $project->price = $request->price;
        $project->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('storage/projects/image');
            $image->move($destinationPath, $name);
            $imagename = $name;
        }
        if ($request->hasFile('video')) {
            $image = $request->file('video');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('storage/projects/video');
            $image->move($destinationPath, $name);
            $videoname = $name;
        }
        $project->image = $imagename;
        $project->video = $videoname;
        $project->save();
        return redirect()->route('Projects.index')->with('success','Project  created successfully.');
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
        $project = Project::find($id);
        return view('dashboard.dashboardProjects.edit',compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
        'title' => 'required',
        'price' => 'required',
        'description' => 'required',
        'image' => 'mimes:jpeg,png,jpg',
        'video' => 'mimes:mp4,ogx,oga,ogv,ogg,webm',
        ]);
        $project = Project::where('id', '=', $id)->firstOrFail();
        $project->title = $request->title;
        $project->price = $request->price;
        $project->description = $request->description;
        if($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $imgpath= public_path('/storage/projects/image/').$project->image;
            if(File::exists($imgpath)) {
                File::delete($imgpath);
            }
            $destinationPath= public_path('/storage/projects/image/');
            $image->move($destinationPath, $name);
            $imagename = $name;
        } else {
            $imagename =  $project->image;
        }
        if($request->hasFile('video')) {
            $image = $request->file('video');
            File::delete($project->video);
            $name = time().'.'.$image->getClientOriginalExtension();
            $videopath= public_path('/storage/projects/video/').$project->video;
            if(File::exists($videopath)) {
                File::delete($videopath);
            }
            $destinationPath= public_path('/storage/projects/video/');
            $image->move($destinationPath, $name);
            $videoname = $name;
        } else {
            $videoname = $project->video;
        }
        $project->image = $imagename;
        $project->video = $videoname;
        $project->save();
        return redirect()->route('Projects.index')->with('success','Project  updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $img_path='storage/projects/image/'.$project->image;
        $vid_path='storage/projects/video/'.$project->video;
        if ($img_path) {
            unlink($img_path);
        }
        if ($vid_path) {
            unlink($vid_path);
        }
        $project->delete();
        return back()->with('Delete','Project deleted successfully');
    }
}
