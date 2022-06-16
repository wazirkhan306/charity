<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        Comment::create([
            'Comment' => $request->Comment,
            'User_id' => Auth::id(),
            'Post_id' => $request->Post_id,
        ]);
        return redirect()->back()->with('Messagge', 'Comment');
    }
}
