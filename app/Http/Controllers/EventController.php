<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\setting;
use App\Models\Cause;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use Session;
use Auth;

class EventController extends Controller
{

    public function index()
    {
        $Events = Event::orderBy('created_at','desc')->paginate(4);
        $Gallers = Gallery::orderBy('created_at','desc')->paginate(20);
           return view('frontend.Events.index',compact('Events','Gallers'));

    }

    public function show($slug)
    {
        $Event = Event::where('slug', '=', $slug)->firstOrFail();
        return view('frontend.Events.show',compact('Event'));
    }
}
