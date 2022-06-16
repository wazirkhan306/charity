<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use App\Models\Post;
use File;
use Auth;
use Validator;

class dashboardPostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $Posts = Post::with('Category')->with('User')->simplePaginate(10);
        return view('dashboard.dashboardPosts.index',compact('Posts'));
    }

    public function create()
    {
        $Users = User::all();
        $Categores = Category::all();
        return view('dashboard.dashboardPosts.create',compact('Users','Categores'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'mimes:jpeg,png,jpg', //only allow this type extension file.
        ]);
        $Post = new Post;
        $Post->Title_en = $request->input('Title_en');
        $Post->Title_ar = $request->input('Title_ar');
        $Post->Title_gr = $request->input('Title_gr');
        $Post->author_id = $request->input('author_id');
        $Post->category_id = $request->input('category_id');
        $Post->slug = $request->input('slug');
        $Post->seo_title = $request->input('seo_title');
        $Post->excerpt = $request->input('excerpt');
        $Post->body_en = $request->input('body_en');
        $Post->body_ar = $request->input('body_ar');
        $Post->body_gr = $request->input('body_gr');
        $Post->meta_description = $request->input('meta_description');
        $Post->meta_keywords = $request->input('meta_keywords');
        $Post->featured = $request->input('featured');
        if ($request->file('image')){
          $file = $request->file('image');
          $date = date('FY');
          $destinationPath = 'storage/posts/'.$date.'/';
          $viewimage = 'storage/posts/'.$date.'/';
          $filename = $viewimage.$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $Post->image = $filename;
          $Post->save();
        }else{
          $Post->save();
        }
          $Post->save();
                return redirect()->TO('dashboard/dashboardPosts')
                        ->with('success','Post created successfully.');
    }

    public function edit($slug)
    {
        $Post = Post::where('slug', '=', $slug)->firstOrFail();
        $Users = User::all();
        $Categores = Category::all();
        return view('dashboard.dashboardPosts.edit',compact('Post','Users','Categores'));
    }

    public function update(Request $request, $slug)
    {
        $Post = Post::where('slug', '=', $slug)->firstOrFail();
        $this->validate($request, [
            'image' => 'mimes:jpeg,png,jpg', //only allow this type extension file.
        ]);
        $Post->Title_en = $request->input('Title_en');
        $Post->Title_ar = $request->input('Title_ar');
        $Post->Title_gr = $request->input('Title_gr');
        $Post->author_id = $request->input('author_id');
        $Post->category_id = $request->input('category_id');
        $Post->slug = $request->input('slug');
        $Post->seo_title = $request->input('seo_title');
        $Post->excerpt = $request->input('excerpt');
        $Post->body_en = $request->input('body_en');
        $Post->body_ar = $request->input('body_ar');
        $Post->body_gr = $request->input('body_gr');
        $Post->meta_description = $request->input('meta_description');
        $Post->meta_keywords = $request->input('meta_keywords');
        $Post->featured = $request->input('featured');
        // THIS FUNCTION UPDATE NEW IMAGE Settings IN PAGE Settings UPDATE //
        if ($request->file('image')){
          File::delete($Post->image);
          $file = $request->file('image');
          $date = date('FY');
          $destinationPath = 'storage/posts/'.$date.'/';
          $viewimage = 'storage/posts/'.$date.'/';
          $filename = $viewimage.$file->getClientOriginalName();
          $file->move($destinationPath, $filename);
          $Post->image = $filename;
          $Post->save();
        }else{
          $Post->save();
        }
          $Post->save();
                return redirect()->TO('dashboard/dashboardPosts')
                        ->with('success','Post created successfully.');
    }


    public function destroy($id)
    {
        $Post = Post::findOrFail($id);
        File::delete($Post->image);
        $Post->delete();
        return back()->with('Delete','Post Deleted successfully');
    }
}
