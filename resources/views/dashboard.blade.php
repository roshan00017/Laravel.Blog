@extends('layouts')

@section('content')
    <div class="container">
        <div>
            <div class="text-right">
                <h4><small>Welcome, {{ Auth::user()->name }}</small></h4>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createPostModal">
                Create a new post
                </button>

                
                <form action="{{ route('logout') }}" method="POST" style="display: inline-block;">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
        <h1>All Posts</h1>
        @foreach($posts as $post)
        <div class="card" style="width: 60rem;">
       <h5 class="card-title">{{ $post->title }}</h5>
        <p class="card-text">{{ $post->body }}</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">Posted By &nbsp; {{$post->user->name}}</li>
            <li class="list-group-item">Posted On &nbsp;{{$post->created_at}}</li>
          
        </ul>
      
        <form method="POST" action="{{ route('comments.store', $post->id) }}">
            @csrf
            <div class="form-group">
                <label for="comment">Comment:</label>
                <textarea class="form-control" name="comment" id="comment" rows="3" required></textarea>
            </div>
            
            <button type="submit" class="btn btn-primary">Add Comment</button>
        </form>
        <div class="comments">
        @foreach($post->comments as $comment)
        
                        <div class="comment">
                            <p>{{ $comment->comment }} <br>By: {{ @$comment->user->name }} </p>
                            <!-- Show commented_by field here -->
                            <p></p>
                        </div>
        @endforeach
        </div>
    </div>
    <br>
@endforeach


    </div>
   
@endsection
