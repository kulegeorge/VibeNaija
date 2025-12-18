@extends('admin.admin_dashboard_new')
@section('admin2')

 <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
<div class="card p-4">
    <div class="card-header">
    <h4>{{ $notification->data['title'] ?? 'Notification' }}</h4>
</div>
<div class="card-body">
    <p class="mt-3" style="white-space: pre-line;">
        {{ $notification->data['message'] ?? $notification->data['body'] ?? '' }}
    </p>

    @if(!empty($notification->data['url']))
        <a href="{{ $notification->data['url'] }}" class="btn btn-danger mt-3">
            Open Related Content
        </a>
    @endif
</div>
<div class="card-footer">
    <p class="text-muted mt-4">
        Sent: {{ $notification->created_at->format('d M Y, h:i A') }}
    </p>
</div>
</div>
</div>
@endsection
