<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Session;
use Auth;


class PostController extends Controller
{
    public function index()
    {
        $Posts = Post::with('Category')->with('User')->simplePaginate(10);
        $RentPosts = Post::orderBy('created_at','desc')->get();
           return view('frontend.Posts.index',compact('Posts','RentPosts'));
    }

    public function show($slug)
    {
        $Post = Post::where('slug', '=', $slug)->firstOrFail();
        $RentPosts = Post::orderBy('created_at','desc')->get();
        $Comments = $Post->Comments;
        return view('frontend.Posts.show',compact('Post','Comments','RentPosts'));
    }


}
