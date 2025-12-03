@extends('admin.admin_dashboard')

@section('content')

<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h4>Your Notifications</h4>
        <form method="POST" action="{{ route('notifications.clear') }}">
            @csrf
            <button class="btn btn-danger btn-sm">Clear All</button>
        </form>
    </div>

    <div class="card-body">
        @foreach($notifications as $notification)
            <a href="{{ route('notifications.show', $notification->id) }}" class="d-block p-2 border-bottom">
                <strong>{{ $notification->data['title'] ?? 'Notification' }}</strong><br>
                <small>{{ $notification->data['message'] ?? $notification->data['body'] ?? '' }}</small>
            </a>
        @endforeach

        <div class="mt-3">
            {{ $notifications->links() }}
        </div>
    </div>
</div>

@endsection
