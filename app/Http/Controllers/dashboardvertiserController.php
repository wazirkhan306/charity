<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Role;
use App\Models\User;
use App\Models\advertiser;
use File;
use Auth;
use Validator;

class dashboardvertiserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $advertisers = advertiser::simplePaginate(10);
        return view('dashboard.dashboardAds.index',compact('advertisers'));
    }

    public function create()
    {
        return view('dashboard.dashboardAds.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,png,jpg', //only allow this type extension file.
        ]);
        $Ad = new advertiser;
        $Ad->Location    = $request->input('Location');
        $Ad->type        = $request->input('type');
        $Ad->name        = $request->input('name');
        $Ad->displayname = $request->input('displayname');
        $Ad->url         = $request->input('url');
        $Ad->code        = $request->input('code');
        if ($request->file('image')){
          $file = $request->file('image');
          $date = date('FY');
          $destinationPath = 'storage/ads/'.$date.'/';
          $viewimage = 'storage/ads/'.$date.'/';
          $filename = $viewimage.$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $Ad->image = $filename;
          $Ad->save();
        }else{
          $Ad->save();
        }
          $Ad->save();
                return redirect()->TO('dashboard/dashboardAds')
                        ->with('success','Ads created successfully.');
    }

    public function edit($name)
    {
        $Ads = advertiser::where('name', '=', $name)->firstOrFail();
        return view('dashboard.dashboardAds.edit',compact('Ads'));
    }

    public function update(Request $request, $name)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,png,jpg', //only allow this type extension file.
        ]);
        $Ads = advertiser::where('name', '=', $name)->firstOrFail();
        $Ads->Location    = $request->input('Location');
        $Ads->type        = $request->input('type');
        $Ads->name        = $request->input('name');
        $Ads->displayname = $request->input('displayname');
        $Ads->url         = $request->input('url');
        $Ads->code        = $request->input('code');
        // THIS FUNCTION UPDATE NEW IMAGE Settings IN PAGE Settings UPDATE //
        if ($request->file('image')){
          File::delete($Ads->image);
          $file = $request->file('image');
          $date = date('FY');
          $destinationPath = 'storage/ads/'.$date.'/';
          $viewimage = 'storage/ads/'.$date.'/';
          $filename = $viewimage.$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $Ads->image = $filename;
          $Ads->save();
        }else{
          $Ads->save();
        }
          $Ads->save();
                return redirect()->TO('dashboard/dashboardAds')
                        ->with('success','Ads Edit successfully.');
    }

    public function destroy($id)
    {
        $Ads = advertiser::findOrFail($id);
        File::delete($Ads->image);
        $Ads->delete();
        return back()->with('Delete','Ads Deleted successfully');
    }
}
