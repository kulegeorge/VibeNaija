@extends('admin.admin_dashboard')
@section('admin')

<style>
    body {
        background: #f0f2f5 !important;
    }

    /* MAIN CARD STYLE */
    .dashboard-card {
        background: #ffffff;
        border: 1px solid #dcdcdc;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        padding: 25px;
        margin-bottom: 25px;
        border-radius: 0px !important;
        transition: 0.2s ease-in-out;
    }

    .dashboard-card:hover {
        box-shadow: 0 6px 18px rgba(0,0,0,0.08);
        transform: translateY(-2px);
    }

    .dashboard-card:nth-child(odd) {
        background: #fafafa;
    }

    .dashboard-card:nth-child(even) {
        background: #fdfdfd;
    }

    .stat-number {
        font-size: 36px;
        font-weight: 700;
    }

    .section-title {
        font-weight: 800;
        margin-bottom: 20px;
        border-left: 4px solid #0d6efd;
        padding-left: 10px;
    }

    .leaderboard-item {
        padding: 12px 0;
        border-bottom: 1px solid #ececec;
    }

    .leaderboard-item:last-child {
        border-bottom: none;
    }

    .avatar {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        object-fit: cover;
        box-shadow: 0 3px 7px rgba(0,0,0,0.1);
    }

    .badge-icon {
        width: 75px;
        height: 75px;
        object-fit: contain;
        border-radius: 0px !important;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        background: #fff;
        padding: 5px;
    }

    .rank-number {
        width: 45px;
        height: 45px;
        border-radius: 0px !important;
        background: #e9ecef;
        color: #333;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 20px;
    }

    .hover-shadow {
        transition: 0.15s ease;
    }

    .hover-shadow:hover {
        box-shadow: 0 6px 18px rgba(0,0,0,0.07);
        transform: translateY(-2px);
    }
</style>

<div class="container py-4" style="margin-top:90px;">

    <!-- USER HEADER -->
    <div class="dashboard-card text-center">
        <img class="wd-50 ht-50 rounded-circle" src="{{ (!empty($user->photo)) ? url('upload/'.$user->photo) : url('upload/no_image.jpg'); }}" alt="profile Image" />

        <h4 class="fw-bold">{{ $user->name }}</h4>
        <p class="text-muted mb-1">{{ $user->email }}</p>
        <p class="text-muted mb-1">Total Points • {{ $user->points }} </p>
        <p class="text-muted">Member since {{ $user->created_at->format('M d, Y') }}</p>
    </div>

    <!-- STATISTICS -->
    <div class="row">
        <div class="col-md-4">
            <div class="dashboard-card bg-light">
                <h6 class="fw-bold mb-2">Total Earnings</h6>
                <div class="stat-number text-success">₦12,500</div>
                <p class="text-muted small">Earned from approved tasks</p>
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card bg-light">
                <h6 class="fw-bold mb-2">Total Points</h6>
                <div class="stat-number text-primary">{{ $user->points }}</div>
                <p class="text-muted small">Earned more points by  completing Task</p>
                
            </div>
        </div>

        <div class="col-md-4">
            <div class="dashboard-card bg-light">
                <h6 class="fw-bold mb-2">Completed Tasks</h6>
                <div class="stat-number text-dark">{{ $taskcompleted }}</div>
                <p class="text-muted small">Task(s) successfully approved</p>
            </div>
        </div>
    </div>

    <!-- BADGES + LEVEL PROGRESS -->
    <div class="row">

        <!-- BADGES -->
        <div class="col-md-6">
            <div class="dashboard-card">
                <h5 class="section-title">Your Badges</h5>
                <div class="d-flex flex-wrap gap-3">
                    @php
    $sumbadges = 0;
@endphp

@foreach($badges as $badge)
    @php $sumbadges++; @endphp
    <img src="{{ $badge->badge_icon }}" class="avatar me-3" style="width:50px;height:50px;">
@endforeach

</div>

<p>Badges <strong>Collected</strong></p>
@if($sumbadges <= 1)

<p class="text-muted small">Congratulations! You have {{ $sumbadges }} Badge awarded</p>

@else
<p class="text-muted small">Congratulations! You have {{ $sumbadges }} Badges awarded</p>
@endif

</div>
        </div>

        <!-- LEVEL PROGRESSION -->
        <div class="col-md-6">
            <div class="dashboard-card">
                <h5 class="section-title">Level Progress</h5>

                {{-- BRONZE --}}
                @if($user->points < 1000)
                    <p class="fw-bold mb-1">Current Level: Bronze</p>

                    @php
                        $progress = ($user->points / 1000) * 100;
                        $needed = 1000 - $user->points;
                    @endphp

                    <div class="progress mb-2">
                        <div class="progress-bar bg-secondary" style="width: {{ $progress }}%"></div>
                    </div>

                    <p>Next Level: <strong>Silver</strong></p>
                    <p class="text-muted small">Points needed: {{ $needed }}</p>

                {{-- SILVER --}}
                @elseif($user->points >= 1000 && $user->points < 1500)

                    @php
                        $progress = (($user->points - 1000) / 500) * 100;
                        $needed = 1500 - $user->points;
                    @endphp

                    <p class="fw-bold mb-1">Current Level: Silver</p>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-secondary" style="width: {{ $progress }}%"></div>
                    </div>

                    <p>Next Level: <strong>Gold</strong></p>
                    <p class="text-muted small">Points needed: {{ $needed }}</p>

                {{-- GOLD --}}
                @elseif($user->points >= 1500 && $user->points < 2500)

                    @php
                        $progress = (($user->points - 1500) / 1000) * 100;
                        $needed = 2500 - $user->points;
                    @endphp

                    <p class="fw-bold mb-1">Current Level: Gold</p>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-warning" style="width: {{ $progress }}%"></div>
                    </div>

                    <p>Next Level: <strong>Diamond</strong></p>
                    <p class="text-muted small">Points needed: {{ $needed }}</p>

                {{-- DIAMOND --}}
                @else
                    <p class="fw-bold mb-1">Current Level: Diamond</p>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-info" style="width: 100%"></div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <!-- LEADERBOARD -->
    <div class="dashboard-card">
        <h5 class="section-title mb-4">🏆 Leaderboard</h5>

        @foreach($leaders as $index => $leader)
            <div class="leaderboard-item hover-shadow d-flex align-items-center p-3 bg-white">

                <div class="rank-number me-3">{{ $index + 1 }}</div>

                <img class="wd-50 ht-50 rounded-circle" src="{{ (!empty($leader->photo)) ? url('upload/'.$leader->photo) : url('upload/no_image.jpg'); }}" alt="profile Image" />

                 <div class="flex-grow-1">
                    <div class="fw-semibold">{{ $leader->name }}</div>
                    <small class="text-muted">{{ $leader->points }} Pts</small>
                </div>

                @if($leader->id == $user->id)
               
                    <span class="badge bg-warning px-3 py-2">You</span>

                    @else
                    
                @endif

            </div>
        @endforeach
    </div>

    <!-- UPCOMING REWARDS -->
    <div class="dashboard-card">
        <h5 class="section-title">Upcoming Rewards</h5>

        <ul class="list-group list-group-flush">
            <li class="list-group-item bg-transparent border-0">🥈 Reach 1000 Points→ Unlock Silver</li>
            <li class="list-group-item bg-transparent border-0">🥇 Reach 1500 Points→ Unlock Gold</li>
            <li class="list-group-item bg-transparent border-0">💎 Reach 2500 Points→ Unlock Diamond</li>
        </ul>
    </div>

</div>

@endsection
