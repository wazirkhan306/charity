<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{

    public function index()
    {
        $staffs = Staff::simplePaginate(10);
        return view('dashboard.dashboardStaff.index',compact('staffs'));
    }

    public function create()
    {
        return view('dashboard.dashboardStaff.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'password' => ['required', 'string', 'min:8'],
        ]);
        $this->validate($request, [
            'avatar' => 'mimes:jpeg,png,jpg',
        ]);
        $staff = new Staff;
        $staff->name = $request->name;
        $staff->phone = $request->phone;
        $staff->address = $request->address;
        $staff->email = $request->email;
        $staff->password   = Hash::make($request->password);
        if ($request->file('image')){
            $file = $request->file('image');
            $destinationPath = 'storage/staffs/';
            $filename = $file->getClientOriginalName();
            $file->move($destinationPath, $filename);
            $staff->image = $filename;
            $staff->save();
        }
        $staff->save();
                return redirect()->route('staff.index')->with('success','Staff created successfully.');
    }

    public function show(Staff $staff)
    {
        //
    }

    public function edit(Staff $staff)
    {
        return view('dashboard.dashboardStaff.edit',compact('staff'));
    }

    public function update(Request $request, Staff $staff)
    {
        $staff = Staff::where('id', '=', $staff->id)->firstOrFail();
        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required'
            ]);
            //validate
            $this->validate($request, [
                'image' => 'mimes:jpeg,png,jpg',
            ]);

            $staff->name = $request->name;
            $staff->phone = $request->phone;
            $staff->address = $request->address;
            $staff->email = $request->email;
            if ($request->file('image')){
              $file = $request->file('image');
              $date = date('FY');
              $destinationPath = 'storage/staffs/';
              if(File::exists($destinationPath)) {
                    File::delete($destinationPath);
              }
              $filename = $file->getClientOriginalName();
              $file->move($destinationPath, $filename);
              $staff->image = $filename;
              $staff->save();
            }
            $staff->save();
                    return redirect()->route('staff.index')->with('success','Staff updated successfully.');
    }

    public function destroy(Staff $staff)
    {
        $staff = Staff::findOrFail($staff->id);
        $img_path='storage/staffs/'.$staff->image;
        if ($img_path) {
            unlink($img_path);
        }
        $staff->delete();
        return back()->with('Delete','staff deleted successfully');
    }

}
