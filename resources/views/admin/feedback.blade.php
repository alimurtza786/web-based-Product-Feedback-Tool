@extends('admin.layout.sidebar')

@section('content')
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>Category</th>
            <th>Created AT</th>
            <th>Status</th> <!-- Add a new column for the status toggle -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->title }}</td>
                <td>{{ $user->description }}</td>
                <td>{{ $user->category }}</td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <div class="status-toggle">
                        <input type="checkbox" data-feedback-id="{{ $user->id }}" {{ $user->status ? 'checked' : '' }}>
                    </div>
                </td>
                <td>
                    <form method="POST" action="{{ route('admin.deleteFeedback', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function () {
        $('.status-toggle input').on('change', function () {
            const feedbackId = $(this).data('feedback-id');
            const status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                method: 'POST',
                url: '/admin/toggleStatus/' + feedbackId,
                data: {
                    _token: '{{ csrf_token() }}',
                    status: status
                },
                success: function (response) {
                    console.log(response.message);
                },
                error: function (xhr) {
                    console.error(xhr.responseJSON.message);
                }
            });
        });
    });
</script>
