@extends('admin.admin_dashboard')
@section('admin')
<div class="container" style="padding-top:80px;">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3">Community Forum</h1>
        @auth
        <a href="{{ route('forum.threads.create') }}" class="btn btn-primary">New Topic</a>
        @endauth
    </div>

    <form class="mb-3" method="GET">
        <div class="input-group">
            <input name="q" value="{{ request('q') }}" class="form-control" placeholder="Search threads...">
            <button class="btn btn-outline-secondary">Search</button>
        </div>
    </form>

    <div class="row">
        <div class="col-md-8">
            @foreach($threads as $thread)
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ route('forum.threads.show', $thread) }}">{{ $thread->title }}</a>
                        @if($thread->is_pinned) <span class="badge bg-info">Pinned</span> @endif
                    </h5>
                    <p class="text-muted mb-1">by {{ $thread->user->name }} • {{ $thread->created_at->diffForHumans() }}</p>
                    <p>{{ Str::limit(strip_tags($thread->body), 200) }}</p>
                </div>
            </div>
            @endforeach

            {{ $threads->withQueryString()->links() }}
        </div>

        <div class="col-md-4">
            <div class="card mb-3 p-3">
                <h6>Categories</h6>
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $cat)
                        <li><a href="{{ route('forum.threads.index', ['category' => $cat->slug]) }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>

            @auth
            <div class="card p-3">
                <h6>Your stats</h6>
                <p>Points: {{ auth()->user()->points }} Pts</p>
                <p>Current Level:  {{-- BRONZE --}}
                @if(auth()->user()->points  < 1000)
                     Bronze            

                {{-- SILVER --}}
                @elseif(auth()->user()->points  >= 1000 && auth()->user()->points  < 1500)

                   

                    Silver

                {{-- GOLD --}}
                @elseif(auth()->user()->points  >= 1500 && auth()->user()->points  < 2500)

                     Gold
                   
            
                {{-- DIAMOND --}}
                @else
                    Diamond
                @endif</p>
            </div>
            @endauth
        </div>
    </div>
</div>
@endsection
