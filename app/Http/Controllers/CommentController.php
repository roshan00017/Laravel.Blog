<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class CommentController extends Controller
{

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
        ]);
    
        $post = Post::findOrFail($request->post_id);
    
        $post->comments()->create([
            'comment' => $request->comment,
            'commented_by' => Auth::id(), // fill commented_by with authenticated user's ID
        ]);
    
        return redirect()->back()->with('success', 'Comment added successfully.');
    }
    
    
   
}
