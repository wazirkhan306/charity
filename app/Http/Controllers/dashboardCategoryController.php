<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use Auth;


class dashboardCategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        // Categores //
        $Categores = Category::simplePaginate(10);
        return view('dashboard.dashboardCategores.index',compact('Categores'));
    }

    public function create()
    {
        return view('dashboard.dashboardCategores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
        'title' => 'required',
        'slug' => 'required',
        ]);
        $Category = new Category;
        $Category->order  = $request->input('order');
        $Category->title  = $request->input('title');
        $Category->slug   = $request->input('slug');
        $Category->color  = $request->input('color');
        $Category->save();
        return redirect()->TO('dashboard/dashboardCategores')
                        ->with('success','Category created successfully.');
    }

    public function edit($slug)
    {
        $Category = Category::where('slug', '=', $slug)->firstOrFail();
        return view('dashboard.dashboardCategores.edit',compact('Category'));
    }

    public function update(Request $request, $slug)
    {
        $request->Category([
        'title' => 'required',
        'slug' => 'required',

        ]);
        $Category = Category::where('slug', '=', $slug)->firstOrFail();
        $Category->order  = $request->input('order');
        $Category->title  = $request->input('title');
        $Category->slug   = $request->input('slug');
        $Category->color  = $request->input('color');
        $Category->save();
        return redirect()->TO('dashboard/dashboardCategores')
                        ->with('success','Category Update successfully.');
    }

    public function destroy($id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
        return back()->with('Delete','Category deleted successfully');
    }
}
