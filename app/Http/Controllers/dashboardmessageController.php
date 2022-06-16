<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Role;
use App\Models\User;
use App\Models\Message;
use File;
use Auth;

class dashboardmessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $Messages = Message::simplePaginate(10);
        return view('dashboard.dashboardMessages.index',compact('Messages'));
    }

    public function destroy($id)
    {
        $Message = Message::findOrFail($id);
        $Message->delete();
        return back()->with('Delete','Message Deleted successfully');
    }
}
