<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\Event;
use File;
use Auth;
use Validator;

class dashboardEventController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $Events = Event::simplePaginate(10);
        return view('dashboard.dashboardEvents.index',compact('Events'));
    }


    public function create()
    {
        //To Get All dashboardEvents
        return view('dashboard.dashboardEvents.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,png,jpg', //only allow this type extension file.
        ]);
        $Event = new Event;
        $Event->Title_en = $request->input('Title_en');
        $Event->Title_ar = $request->input('Title_ar');
        $Event->Title_gr = $request->input('Title_gr');
        $Event->Content_en = $request->input('Content_en');
        $Event->Content_ar = $request->input('Content_ar');
        $Event->Content_gr = $request->input('Content_gr');
        $Event->StartTime = $request->input('StartTime');
        $Event->slug = $request->input('slug');
        $Event->Days = $request->input('Days');
        $Event->Hours = $request->input('Hours');
        $Event->Address = $request->input('Address');
        $Event->Minutes = $request->input('Minutes');
        $Event->FinishTime = $request->input('FinishTime');
        $Event->StartTime = $request->input('StartTime');
        if ($request->file('image')){
          $file = $request->file('image');
          $date = date('FY');
          $destinationPath = 'storage/Events/'.$date.'/';
          $viewimage = 'storage/Events/'.$date.'/';
          $filename = $viewimage.$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $Event->image = $filename;
          $Event->save();
        }else{
          $Event->save();
        }
        $Event->save();
        return redirect()->TO('dashboard/dashboardEvents')
                        ->with('success','Event created successfully.');
    }

    public function edit($slug)
    {
        $Event = Event::where('slug', '=', $slug)->firstOrFail();
        return view('dashboard.dashboardEvents.edit',compact('Event'));
    }


    public function update(Request $request, $slug)
    {
        $Event = Event::where('slug', '=', $slug)->firstOrFail();
        request()->validate([
         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',

       ]);
        $Event->Title_en = $request->input('Title_en');
        $Event->Title_ar = $request->input('Title_ar');
        $Event->Title_gr = $request->input('Title_gr');
        $Event->Content_en = $request->input('Content_en');
        $Event->Content_ar = $request->input('Content_ar');
        $Event->Content_gr = $request->input('Content_gr');
        $Event->StartTime = $request->input('StartTime');
        $Event->slug = $request->input('slug');
        $Event->Days = $request->input('Days');
        $Event->Hours = $request->input('Hours');
        $Event->Address = $request->input('Address');
        $Event->Minutes = $request->input('Minutes');
        $Event->FinishTime = $request->input('FinishTime');
        $Event->StartTime = $request->input('StartTime');
        if ($request->file('image')){
          File::delete($Event->image);
          $file = $request->file('image');
          $date = date('FY');
          $destinationPath = 'storage/Events/'.$date.'/';
          $viewimage = 'storage/Events/'.$date.'/';
          $filename = $viewimage.$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $Event->image = $filename;
         $Event->save();
        }else{
          $Event->save();
        }
          $Event->save();
          return redirect()->TO('dashboard/dashboardEvents')
                        ->with('success','Event created successfully.');
    }

    public function destroy($id)
    {
       $Event = Event::findOrFail($id);
        File::delete($Event->image);
        $Event->delete();
        return back()->with('Delete','Event Deleted successfully');
    }
}
