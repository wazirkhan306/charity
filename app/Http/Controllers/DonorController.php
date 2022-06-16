<?php

namespace App\Http\Controllers;

use App\Models\Donor;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonorController extends Controller
{

    public function donor() {
        return view('frontend.donor.index');
    }

    public function donorUpdateProfile() {
        return view('frontend.donor.update_profile');
    }

    public function donorupdate(Request $request) {

        $donor = Donor::find($request->id);
        // dd($donor->name);
        $donor->name = $request->name;
        $donor->email = $request->email;
        $donor->phone = $request->phone;
        $donor->save();
        // dd($donor->save());
        // $update = Donor::where('id',$request->id)->update(['name'=>$request->name]);
        // dd($update);
        // dd($update);
        return redirect()->back()->with('success','success updated record');
    }

    public function projectDetail($id) {
        $project = Project::find($id);
        return view('frontend.donor.project_detail',compact('project'));
    }
}
