<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\Cause;
use File;
use Auth;
use Validator;

class dashboardCauseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $Causes = Cause::with('Category')->simplePaginate(10);
        return view('dashboard.dashboardCauses.index',compact('Causes'));
    }

    public function create()
    {
        $Categores = Category::all();
        return view('dashboard.dashboardCauses.create',compact('Categores'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,png,jpg', //only allow this type extension file.
        ]);
        $Cause = new Cause;
        $Cause->Title_en = $request->input('Title_en');
        $Cause->Title_ar = $request->input('Title_ar');
        $Cause->Title_gr = $request->input('Title_gr');
        $Cause->slug = $request->input('slug');
        $Cause->Raised = $request->input('Raised');
        $Cause->Goal = $request->input('Goal');
        $Cause->Content_en = $request->input('Content_en');
        $Cause->Content_ar = $request->input('Content_ar');
        $Cause->Content_gr = $request->input('Content_gr');
        $Cause->Donors = $request->input('Donors');
        $Cause->category_id = $request->input('category_id');
        // THIS FUNCTION UPDATE NEW IMAGE Settings IN PAGE Settings UPDATE //
        if ($request->file('image')){
          $file = $request->file('image');
          $date = date('FY');
          $destinationPath = 'storage/Causes/'.$date.'/';
          $viewimage = 'storage/Causes/'.$date.'/';
          $filename = $viewimage.$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $Cause->image = $filename;
          // THIS TO SAVE  Settings UPDATE //
          $Cause->save();
        }else{
          $Cause->save();
        }
          $Cause->save();
                return redirect()->TO('dashboard/dashboardCauses')
                        ->with('success','Cause created successfully.');
    }


    public function edit($slug)
    {
       $Cause = Cause::where('slug', '=', $slug)->firstOrFail();
        $Categores = Category::all();
        return view('dashboard.dashboardCauses.edit',compact('Cause','Categores'));
    }


    public function update(Request $request, $slug)
    {
        $Cause = Cause::where('slug', '=', $slug)->firstOrFail();
        request()->validate([
         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
       ]);
        $Cause->Title_en = $request->input('Title_en');
        $Cause->Title_ar = $request->input('Title_ar');
        $Cause->Title_gr = $request->input('Title_gr');
        $Cause->slug = $request->input('slug');
        $Cause->Raised = $request->input('Raised');
        $Cause->Goal = $request->input('Goal');
        $Cause->Content_en = $request->input('Content_en');
        $Cause->Content_ar = $request->input('Content_ar');
        $Cause->Content_gr = $request->input('Content_gr');
        $Cause->Donors = $request->input('Donors');
        $Cause->category_id = $request->input('category_id');
       if ($request->file('image')){
          File::delete($Cause->image);
          $file = $request->file('image');
          $date = date('FY');
          $destinationPath = 'storage/Causes/'.$date.'/';
          $viewimage = 'storage/Causes/'.$date.'/';
          $filename = $viewimage.$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $Cause->image = $filename;
           $Cause->save();
        }
          $Cause->save();
                return redirect()->TO('dashboard/dashboardCauses')
                        ->with('success','Cause Update successfully.');
    }

    public function destroy($id)
    {
       $Cause = Cause::findOrFail($id);
        File::delete($Cause->image);
        $Cause->delete();
        return back()->with('Delete','Cause Deleted successfully');
    }
}
