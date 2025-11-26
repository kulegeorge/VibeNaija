@extends('admin.admin_dashboard')
@section('admin')
<div class="container" style="padding-top:80px;">
    <a href="{{ route('forum.threads.index') }}" class="btn btn-sm btn-outline-secondary mb-3">Back to forum</a>

    <div class="card mb-4">
        <div class="card-body">
            <h2>{{ $thread->title }}</h2>
            <p class="text-muted">by {{ $thread->user->name }} • {{ $thread->created_at->diffForHumans() }}</p>
            <div class="mt-3">{!! nl2br(e($thread->body)) !!}</div>
        </div>
    </div>

    <h5>Replies ({{ $thread->posts->count() }})</h5>

    @foreach($thread->posts as $post)
    <div class="card mb-2">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <div>
                    <strong>{{ $post->user->name }}</strong>
                    <small class="text-muted">• {{ $post->created_at->diffForHumans() }}</small>
                </div>
                <div>
                    <form action="{{ route('forum.posts.like', $post) }}" method="POST" style="display:inline;">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary">Like ({{ $post->likes()->count() }})</button>
                    </form>
                </div>
            </div>
            <div class="mt-2">{!! nl2br(e($post->body)) !!}</div>

            <div class="mt-2">
                @can('update', $post)
                    <a href="#" class="btn btn-sm btn-outline-secondary">Edit</a>
                @endcan
                @can('delete', $post)
                    <form action="{{ route('forum.posts.destroy', $post) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
    @endforeach

    @auth
    <div class="card mt-4">
        <div class="card-body">
            <form action="{{ route('forum.posts.store') }}" method="POST">
                @csrf
                <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                <div class="mb-2">
                    <textarea name="body" rows="4" class="form-control" placeholder="Write your reply..." required></textarea>
                    @error('body') <div class="text-danger small">{{ $message }}</div> @enderror
                </div>
                <button class="btn btn-primary">Post Reply</button>
            </form>
        </div>
    </div>
    @else
        <p class="mt-3">Please <a href="{{ route('login') }}">login</a> to reply.</p>
    @endauth
</div>
@endsection
