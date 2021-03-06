<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use IsAdmin;
use App\Models\setting;
use App\Models\Role;
use App\Models\User;
use Auth;


class dashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        return view('dashboard.admin');
    }

}
