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

class dashboardmenu_itemController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }


    public function create()
    {
        return view('dashboard.dashboardMenu-items.create');
    }

    public function store(Request $request)
    {
         $request->validate([
        'menu_id' => 'required',
        ]);
        $Menu = new menu_item;
        $Menu->menu_id = $request->input('menu_id');
        $Menu->order = $request->input('order');
        $Menu->title = $request->input('title');
        $Menu->url = $request->input('url');
        $Menu->target = $request->input('target');
        $Menu->save();
        return redirect()->TO('dashboard/dashboardMenus')
                        ->with('success','Menu Item created successfully.');
    }


    public function destroy($title)
    {
        $item = menu_item::where('title', '=', $title)->firstOrFail();
        $item->delete();
        return back()->with('Delete','menu item deleted successfully');
    }
}
