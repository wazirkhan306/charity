<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use App\Models\Cause;
use App\Models\Role;
use App\Models\User;
use Session;
use Auth;
use App\Models\Post;
use App\Models\Project;

class CauseController extends Controller
{
    public function index()
    {
        // $Causes = Cause::orderBy('created_at','desc')->simplePaginate(10);
        $projects = Project::orderBy('created_at','desc')->simplePaginate(10);

        return view('frontend.Causes.index',compact('projects'));
    }

   public function show($slug)
    {
        $Cause = Cause::where('slug', '=', $slug)->firstOrFail();
        $RentPosts = Post::orderBy('created_at','desc')->get();
        return view('english.Causes.show',compact('Cause','RentPosts'));
    }
}
