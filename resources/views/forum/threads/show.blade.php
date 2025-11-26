@extends('admin.admin_dashboard')
@section('admin')

<style>
    .post-card:hover {
        background: #fafafa;
    }
    .avatar {
        width: 42px;
        height: 42px;
        border-radius: 50%;
        object-fit: cover;
    }
</style>

<div class="container" style="padding-top:80px; max-width: 900px;">

    <a href="{{ route('forum.threads.index') }}" class="btn btn-light mb-4">
        ← Back to Forum
    </a>

    <!-- THREAD HEADING -->
    <div class="card shadow-sm mb-4 border-0">
        <div class="card-body">
            <h2 class="mb-2">{{ $thread->title }}</h2>
            <p class="mb-3 text-muted">
                <strong>{{ $thread->user->name }}</strong>
                <span class="mx-2">•</span>
                {{ $thread->created_at->diffForHumans() }}
            </p>
            <div class="p-3 rounded bg-light">
                {!! nl2br(e($thread->body)) !!}
            </div>
        </div>
    </div>

    <h5 class="mb-3">Replies ({{ $thread->posts->count() }})</h5>

    <!-- POSTS -->
    @foreach($thread->posts as $post)
    <div class="card mb-3 shadow-sm border-0 post-card">

        <div class="card-body d-flex">

            <!-- AVATAR -->
            <div class="me-3">
                <img src="https://ui-avatars.com/api/?name={{ urlencode($post->user->name) }}&background=0D8ABC&color=fff"
                     class="avatar shadow-sm">
            </div>

            <!-- CONTENT -->
            <div class="flex-grow-1">
                <div class="d-flex justify-content-between">
                    <div>
                        <strong>{{ $post->user->name }}</strong><br>
                        <small class="text-muted">{{ $post->created_at->diffForHumans() }}</small>
                    </div>

                    <!-- LIKE BUTTON -->
                    <form action="{{ route('forum.posts.like', $post) }}" method="POST">
                        @csrf
                        <button class="btn btn-sm btn-outline-primary">
                            👍 Like ({{ $post->likes()->count() }})
                        </button>
                    </form>
                </div>

                <hr class="my-2">

                <div class="mt-2">
                    {!! nl2br(e($post->body)) !!}
                </div>

                <div class="mt-3">
                    @can('update', $post)
                        <a href="#" class="btn btn-sm btn-outline-secondary me-2">Edit</a>
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
    </div>
    @endforeach

    <!-- REPLY FORM -->
    @auth
    <div class="card shadow-sm mt-4 border-0">
        <div class="card-header bg-white border-0">
            <h6 class="mb-0">Write a Reply</h6>
        </div>

        <div class="card-body">
            <form action="{{ route('forum.posts.store', $thread->id) }}" method="POST">

                @csrf
                <input type="hidden" name="thread_id" value="{{ $thread->id }}">

                <textarea name="body" rows="4" class="form-control mb-3"
                          placeholder="Share your thoughts..." required></textarea>

                @error('body')
                    <div class="text-danger small mb-2">{{ $message }}</div>
                @enderror

                <button class="btn btn-primary px-4">Post Reply</button>
            </form>
        </div>
    </div>
    @else
        <p class="mt-3">
            Please <a href="{{ route('login') }}">login</a> to reply.
        </p>
    @endauth

</div>
@endsection
