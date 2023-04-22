<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    
    public function index()
    {
        $posts = Post::all();

        return view('posts.dashboard', compact('posts'));
    }
    
    public function create() :View
    {
        return view('posts.create');
    }

   
    public function store(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
    
        // Create a new Post instance and save it to the database
        $post = new Post;
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->user_id = Auth::user()->id; 
        $post->save();
    
        // Redirect the user to the dashboard with a success message
        return redirect('/dashboard');
    }
    
   
    public function show($id)
    {
        $post = Post::with('comments')->find($id);
    
        if (!$post) {
            abort(404);
        }
    
        $canEdit = false;
        $canDelete = false;
    
        // Check if the logged in user is the creator of the post
        if (Auth::check() && Auth::user()->id == $post->user_id) {
            $canEdit = true;
            $canDelete = true;
        }
    
        return view('posts.show', ['post' => $post, 'canEdit' => $canEdit, 'canDelete' => $canDelete]);
    }
    

   
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        /* $this->authorize('update', $post); */
    
        return view('posts.edit', ['post' => $post]);
    }

   
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
        ]);
    
        $post = Post::findOrFail($id);
        /* $this->authorize('update', $post); */
    
        $post->title = $validated['title'];
        $post->body = $validated['body'];
        $post->save();
    
        return redirect('/dashboard')->with(['post' => $post]);
    }
    

   
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
     /*    $this->authorize('delete', $post); */
    
        $post->delete();
    
        return  redirect('/dashboard');
    }
}
