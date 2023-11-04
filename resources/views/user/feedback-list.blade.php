@extends('layouts.usersidebar')
@section('content')
<style>
    .disabled-link {
    background-color: #ccc;
    color: #555;
    padding: 5px 10px;
    border-radius: 5px;
}

</style>

<div class="container">
    <h1>Feedbacks</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Category</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $feedback)
    <tr>
        <td>
            @if ($feedback->status == 1)
                <a href="{{ route('feedback.show', ['feedback' => $feedback->id]) }}">{{ $feedback->title }}</a>
            @else
                <div class="disabled-link">{{ $feedback->title }}</div>
            @endif
        </td>
        <td>{{ $feedback->description }}</td>
        <td>{{ $feedback->category }}</td>
        <td>{{ $feedback->created_at }}</td>
    </tr>
@endforeach


        </tbody>
    </table>
    {{ $feedbacks->links() }}
</div>

@endsection
