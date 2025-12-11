@section('title', 'Vibe Nigeria- All Topics')
@extends('admin.admin_dashboard')
@section('admin')

<div class="container" style="padding-top:80px;">
    <div class="row">
        <div class="col-lg-12">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h2 class="fw-bold mb-0">
                        <i class="fa-solid fa-book-open"></i> All Topics
                    </h2>

                    <a href="{{ route('topics.create') }}" class="btn btn-light">
                        <i class="fa-solid fa-plus"></i> Create New Topic
                    </a>
                </div>

                <div class="card-body">
                    @if ($topics->count() > 0)
                        <table class="table table-bordered table-striped align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th><i class="fa-solid fa-folder-open"></i> Topic Name</th>
                                    <th><i class="fa-solid fa-calendar-days"></i> Created At</th>
                                    <th><i class="fa-solid fa-gear"></i> Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($topics as $topic)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            <i class="fa-solid fa-folder text-warning"></i>
                                            {{ $topic->name }}
                                        </td>

                                        <td>
                                            <i class="fa-solid fa-clock"></i>
                                            {{ $topic->created_at->format('d M, Y') }}
                                        </td>

                                        <td>

                                            <!-- View Questions -->
                                            <a href="{{ route('questions.index', $topic->id) }}" 
                                               class="btn btn-sm btn-secondary me-1">
                                                <i class="fa-solid fa-list"></i> Questions
                                            </a>

                                            <!-- View Topic -->
                                            <a href="{{ route('topics.show', $topic->id) }}" 
                                               class="btn btn-sm btn-info me-1 text-white">
                                                <i class="fa-solid fa-eye"></i> View
                                            </a>

                                            <!-- Edit Topic -->
                                            <a href="{{ route('topics.edit', $topic->id) }}" 
                                               class="btn btn-sm btn-warning me-1">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </a>

                                            <!-- Delete -->
                                            <form action="{{ route('topics.destroy', $topic->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Delete this topic?')" 
                                                        class="btn btn-sm btn-danger">
                                                    <i class="fa-solid fa-trash"></i> Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p class="text-center text-muted">No topics found.</p>
                    @endif
                </div>

            </div>

        </div>
    </div>
</div>

@endsection
