<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cause;
use App\Models\setting;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Session;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        $Causes = Cause::orderBy('created_at','desc')->paginate(6);
        $Events = Event::orderBy('created_at','desc')->paginate(4);
        $Posts = Post::orderBy('created_at','desc')->paginate(2);
        $Gallers = Gallery::orderBy('created_at','desc')->paginate(20);
        return view('frontend.home',compact('Causes','Events','Posts','Gallers'));
    }

    public function about()
    {
        $Causes = Cause::orderBy('created_at','desc')->paginate(6);
        $Events = Event::orderBy('created_at','desc')->paginate(4);
        $Posts = Post::orderBy('created_at','desc')->paginate(2);
        $Gallers = Gallery::orderBy('created_at','desc')->paginate(20);
        return view('frontend.about',compact('Causes','Events','Posts','Gallers'));
    }

    public function Contact()
    {
        $Causes = Cause::orderBy('created_at','desc')->paginate(6);
        $Events = Event::orderBy('created_at','desc')->paginate(4);
        $Posts = Post::orderBy('created_at','desc')->paginate(2);
        $Gallers = Gallery::orderBy('created_at','desc')->paginate(20);
        return view('frontend.Contact',compact('Causes','Events','Posts','Gallers'));
    }
}
