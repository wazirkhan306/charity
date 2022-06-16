<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Role;
use App\Models\User;
use Auth;

class dashboardRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $Roles = Role::simplePaginate(10);
        return view('dashboard.dashboardRoles.index',compact('Roles'));
    }

    public function create()
    {
        return view('dashboard.dashboardRoles.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'display_name' => 'required',
        ]);
        $Role = new Role;
        $Role->name = $request->input('name');
        $Role->display_name = $request->input('display_name');
        $Role->save();
        return redirect()->TO('dashboard/dashboardRoles')
                        ->with('success','Role created successfully.');

    }


    public function edit($name)
    {
        $Role = Role::where('name', '=', $name)->firstOrFail();
        return view('dashboard.dashboardRoles.edit',compact('Role'));
    }

    public function update(Request $request, $name)
    {
        $request->validate([
        'name' => 'required',
        'display_name' => 'required',
        ]);
        $Role = Role::where('name', '=', $name)->firstOrFail();
        $Role->name = $request->input('name');
        $Role->display_name = $request->input('display_name');
        $Role->save();
                return redirect()->TO('dashboard/dashboardRoles')
                        ->with('success','Role Update successfully.');
    }

    public function destroy($id)
    {
        $Role = Role::findOrFail($id);
        $Role->delete();
        return back()->with('Delete','Role deleted successfully');
    }
}
