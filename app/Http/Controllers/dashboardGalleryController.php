<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Role;
use App\Models\User;
use App\Models\Gallery;
use File;
use Auth;
use Validator;

class dashboardGalleryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
       $Galleres = Gallery::simplePaginate(10);
        return view('dashboard.dashboardGalleres.index',compact('Galleres'));
    }


    public function create()
    {
        return view('dashboard.dashboardGalleres.create');
    }

    public function store(Request $request)
    {
        request()->validate([
         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
       ]);
        $Gallery = new Gallery;
       if ($request->file('image')){
          $file = $request->file('image');
          $date = date('FY');
          $destinationPath = 'storage/Galleres/'.$date.'/';
          $viewimage = 'storage/Galleres/'.$date.'/';
          $filename = $viewimage.$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $Gallery->image = $filename;
         $Gallery->save();
        }else{
          $Gallery->save();
        }
          $Gallery->save();
          return redirect()->TO('dashboard/dashboardGalleres')
                        ->with('success','Gallery created successfully.');
    }

    public function destroy($id)
    {
       $Gallery = Gallery::findOrFail($id);
        File::delete($Gallery->image);
        $Gallery->delete();
        return back()->with('Delete','Gallery Deleted successfully');
    }
}
