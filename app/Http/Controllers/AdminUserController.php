<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\User;
use App\Models\Role;
use Auth;
use File;
use Validator;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::where('role_id', 1)->simplePaginate(10);
        return view('dashboard.dashboardUsers.index',compact('users'));
    }
    
    public function create()
    {
        $Roles = Role::all();
        return view('dashboard.dashboardUsers.create',compact('Roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
        ]);
        //validate
        $this->validate($request, [
            'avatar' => 'mimes:jpeg,png,jpg', //only allow this type extension file.
        ]);
        // GET new User
        $User = new User;
        $User->role_id = 2;
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone = $request->phone;
        $User->address = $request->address;
        $User->password = Hash::make($request->password);
        if ($request->file('avatar')){
          $file = $request->file('avatar');
          $destinationPath = 'storage/users/';
          $filename = $file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $User->avatar = $filename;
          $User->save();
        }
        $User->save();
        return redirect()->route('dashboardUsers.index')->with('success','Staff created successfully.');
    }

    public function edit($name)
    {
        $User = User::where('name', '=', $name)->firstOrFail();
        return view('dashboard.dashboardUsers.edit',compact('User'));
    }

    public function update(Request $request, $name)
    {
        $User = User::where('name', '=', $name)->firstOrFail();
         $request->validate([
        'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        'password' => 'required|min:6|confirmed'
        ]);
        $this->validate($request, [
            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $User->name = $request->name;
        $User->email = $request->email;
        $User->phone = $request->phone;
        $User->address = $request->address;
        $User->password = bcrypt(request('password'));
        if ($request->file('avatar')){
          $file = $request->file('avatar');
          $imgpath= public_path('/storage/users/').$User->avatar;
          if(File::exists($imgpath)) {
              File::delete($imgpath);
          }
          $destinationPath = 'storage/users/';
          $filename = $file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $User->avatar = $filename;
          $User->save();
        }else{
          $User->save();
        }

        return redirect()->route('dashboardUsers.index')->with('success','User Updated successfully.');
    }

    public function destroy($id)
    {
        $User = User::findOrFail($id);
        $img_path= public_path('/storage/users/').$User->avatar;
        if(File::exists($img_path)) {
            File::delete($img_path);
        }
        $User->delete();
        return back()->with('Delete','User deleted successfully');
    }
}
