<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Role;
use App\Models\User;
use App\Models\menu_item;
use App\Models\menu;
use Auth;
use DB;

class dashboardmenuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $Menus = menu::get();
        // dd($Menus);w
        return view('dashboard.dashboardMenus.index',compact('Menus'));
    }

    public function create()
    {
        $Menus = menu::with('menu_items')->get();
        return view('dashboard.dashboardMenus.create',compact('Menus'));
    }


    public function store(Request $request)
    {

        $request->validate([
        'name' => 'required',
        ]);
        $Menu = new menu;
        $Menu->name = $request->input('name');
        $Menu->save();
        return redirect()->TO('dashboard/dashboardMenus')
                        ->with('success','Menu created successfully.');
    }


    public function destroy($id)
    {
        $menu = menu::find($id);
        $menu_items = $menu->menu_items();
        $menu->delete();
        $menu_items->delete();
        return back()->with('Delete','Menu deleted successfully');
    }

}
