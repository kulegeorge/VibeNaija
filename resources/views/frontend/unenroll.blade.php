@section('title', 'Vibe Nigeria- Unenroll from Task')
@extends('admin.admin_dashboard_new')
@section('admin2')


 
    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-light text-dark">
            <h4>Unenroll From Task</h4>
        </div>

        <div class="card-body">
            <p>Task: <strong>{{ $task->taskname }}</strong></p>

            <form method="POST" action="{{ route('task.unenroll', $task->id) }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Why are you unenrolling?</label>
                    <textarea name="reason" class="form-control" rows="4" required>{{ old('reason') }}</textarea>

                    @error('reason')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-danger w-100">
                    Confirm Unenroll
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
