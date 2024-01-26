@extends('layouts.usersidebar')

@section('content')
<!-- Include SimpleMDE CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.css">
<!-- Include SimpleMDE JavaScript -->
<script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>

<div class="container">
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h2 class="card-title">{{ $feedback->title }}</h2>
                    <p class="card-text">{{ $feedback->description }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">{{ $feedback->title }}</h3>
                    <p><strong>Category:</strong> {{ $feedback->category }}</p>
                    <p><strong>Vote Count:</strong> {{ $feedback->comments->count() }}</p>
                    <h4>Comments</h4>
                    @foreach($feedback->comments as $comment)
                        <div class="media mb-3">
                            <div class="media-body">
                                <h5 class="mt-0">{{ $comment->user->name }}</h5>
                                <p>{!! Purifier::clean($comment->content) !!}</p>
                                <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>




            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Leave a Comment</h4>
                    <form action="{{ route('comment.store', ['feedback' => $feedback->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <textarea class="form-control" name="content" id="commentContent" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit Comment</button>
                    </form>
                </div>
            </div>


        </div>
    </div>
</div>
<script>
    var simplemde = new SimpleMDE({
        element: document.getElementById("commentContent"),
        toolbar: ["bold", "italic", "code"],
    });
</script>



@endsection
