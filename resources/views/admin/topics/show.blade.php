@section('title')
  Vibe Nigeria-  {{ $topic->name }}
@endsection

@extends('admin.admin_dashboard_new')
@section('admin2')

<!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->

    <div class="card shadow-sm p-4">
        <h3 class="fw-bold">Topic Details</h3>
        <hr>

        <p><strong>Topic Name:</strong> {{ $topic->name }}</p>
        <p><strong>Created At:</strong> {{ $topic->created_at->format('d M, Y') }}</p>

        <a href="{{ route('topics.index') }}" class="btn btn-secondary mt-3">Back</a>
        <a href="{{ route('topics.edit', $topic->id) }}" class="btn btn-warning mt-3">Edit</a>
    </div>

</div>

@endsection
