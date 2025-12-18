@section('title', 'Vibe Nigeria- Edit Topics')
@extends('admin.admin_dashboard_new')
@section('admin2')

<!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->

    <div class="card shadow-sm p-4">
        <h3 class="fw-bold mb-3">Edit Topic</h3>

        <form action="{{ route('topics.update', $topic->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Topic Name:</label>
                <input type="text" name="name" value="{{ $topic->name }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Topic</button>
            <a href="{{ route('topics.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</div>

@endsection
