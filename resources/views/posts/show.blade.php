

 @extends('layouts')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $post->title }}</div>

                    <div class="card-body">
                        {{ $post->body }}
                    </div>

                    @if(Auth::check() && Auth::user()->id == $post->user_id)
                        <div class="card-footer">
                            <a href="{{ route('posts.edit', ['post' => $post]) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
