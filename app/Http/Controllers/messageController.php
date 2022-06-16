<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class messageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        Message::create([
            'Content' => $request->Content,
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
        ]);
        return redirect()->back()->with('Messagge', 'Message');
    }


     public function destroy($id)
    {
        $Message = Message::findOrFail($id);
        $Message->delete();
        return back()->with('Delete','Message Deleted successfully');
    }

}
