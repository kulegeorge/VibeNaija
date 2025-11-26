@extends('admin.admin_dashboard')
@section('admin')

<style>
/* Dashboard card styling */
.dashboard-card {
    border: none;
    border-radius: 18px;
    padding: 25px;
    background: #ffffff;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
}

.progress {
    height: 10px;
    border-radius: 20px;
}

.badge-item {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    background: #fff7df;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
}

.leaderboard-row {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
}

.avatar {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    object-fit: cover;
}
</style>

<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">
        <img src="{{ auth()->user()->avatar ?? 'https://i.pravatar.cc/150' }}" class="avatar mb-3">
        <h3 class="fw-bold">{{ auth()->user()->name }}</h3>
        <p class="text-muted">Level {{ $level->name ?? '1' }} • {{ $totalPoints }} XP</p>
    </div>


    <!-- Stats Row -->
    <div class="row mb-4">

        <!-- Earnings -->
        <div class="col-md-4 mb-3">
            <div class="dashboard-card">
                <h6 class="fw-bold">Earnings</h6>
                <h2 class="fw-bold text-success">₦{{ number_format($earnings) }}</h2>
                <small class="text-muted">Total Earnings from completed tasks</small>
            </div>
        </div>

        <!-- XP / Points -->
        <div class="col-md-4 mb-3">
            <div class="dashboard-card">
                <h6 class="fw-bold">Total Points</h6>
                <h2 class="fw-bold text-primary">{{ $totalPoints }} XP</h2>
                <div class="progress mt-2">
                    <div class="progress-bar bg-primary" style="width: {{ $percentageToNextLevel }}%;"></div>
                </div>
                <small class="text-muted">Progress to Level {{ $nextLevel }}</small>
            </div>
        </div>

        <!-- Completed Tasks -->
        <div class="col-md-4 mb-3">
            <div class="dashboard-card">
                <h6 class="fw-bold">Completed Tasks</h6>
                <h2 class="fw-bold text-warning">{{ $completedTasks }}</h2>
                <small class="text-muted">Challenges you successfully completed</small>
            </div>
        </div>
    </div>


    <!-- Levels & Badges -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="dashboard-card">
                <h5 class="fw-bold mb-3">Your Badges</h5>

                <div class="d-flex gap-3 flex-wrap">
                    @forelse($badges as $badge)
                    <div class="badge-item">
                        <img src="{{ asset('badges/'.$badge->image) }}" width="40">
                    </div>
                    @empty
                    <p class="text-muted">No badges yet. Start completing tasks!</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="dashboard-card">
                <h5 class="fw-bold mb-3">Level Progress</h5>

                <p class="mb-1 fw-bold">Current Level: {{ $level->name }}</p>
                <div class="progress mb-3">
                    <div class="progress-bar bg-success" style="width: {{ $percentageToNextLevel }}%"></div>
                </div>

                <p class="mb-1">Next Level: <strong>{{ $nextLevel }}</strong></p>
                <p class="text-muted">XP needed: {{ $xpNeeded }}</p>
            </div>
        </div>
    </div>


    <!-- Leaderboard -->
    <div class="dashboard-card mb-4">
        <h5 class="fw-bold mb-4">Leaderboard</h5>

        @foreach($leaderboard as $rank => $user)
        <div class="leaderboard-row d-flex align-items-center">
            <div class="fw-bold me-3">{{ $rank + 1 }}</div>
            <img src="{{ $user->avatar ?? 'https://i.pravatar.cc/50' }}" class="avatar me-3" width="40" height="40">

            <div class="flex-grow-1">
                <strong>{{ $user->name }}</strong>
                <div class="text-muted small">{{ $user->total_points }} XP</div>
            </div>

            @if(auth()->id() == $user->id)
                <span class="badge bg-primary">You</span>
            @endif
        </div>
        @endforeach
    </div>


    <!-- Upcoming Rewards -->
    <div class="dashboard-card mb-4">
        <h5 class="fw-bold mb-3">Upcoming Rewards</h5>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">🎁 Reach 500 XP → Unlock *Bronze Badge*</li>
            <li class="list-group-item">🔥 Complete 10 tasks → Get *Task Master* badge</li>
            <li class="list-group-item">💰 Earn ₦5,000 → Unlock *Earner II* title</li>
        </ul>
    </div>

</div>

@endsection
