@section('title', 'Vibe Nigeria - User Task Earnings')
@extends('admin.admin_dashboard')
@section('admin')

<style>
    :root {
        --vibe-green: #008751;
        --vibe-gold: #FFC107;
        --vibe-orange: #FF5722;
        --vibe-purple: #9C27B0;
        --dark-card: rgba(18, 18, 18, 0.85);
    }

    .vibe-card {
        background: var(--dark-card);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 193, 7, 0.3);
        border-radius: 0px;
        overflow: hidden;
        transition: all 0.4s ease;
        box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    }
    .vibe-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 50px rgba(255,193,7,0.15);
        border-color: var(--vibe-gold);
    }
    .vibe-gradient {
        background: linear-gradient(135deg, var(--vibe-green), var(--vibe-orange));
        -webkit-background-clip: text;
        background-clip: text;
        color: transparent;
    }
    .progress-vibe {
        height: 16px;
        background: rgba(255,255,255,0.1);
        border-radius: 50px;
        overflow: hidden;
        border: 2px solid var(--vibe-gold);
    }
    .badge-glow {
        transition: all 0.3s;
        filter: drop-shadow(0 0 15px rgba(255,193,7,0.6));
    }
    .badge-glow:hover {
        transform: scale(1.3) rotate(10deg);
    }
    .you-pulse {
        animation: pulse-gold 2s infinite;
    }
    @keyframes pulse-gold {
        0% { box-shadow: 0 0 0 0 rgba(255,193,7,0.7); }
        70% { box-shadow: 0 0 0 15px rgba(255,193,7,0); }
        100% { box-shadow: 0 0 0 0 rgba(255,193,7,0); }
    }
</style>

<div class="container-fluid py-4">

    <!-- PROFILE SECTION -->
    <div class="vibe-card p-5 text-center text-white mb-4">
        <img src="{{ (!empty($user->photo)) ? url('upload/'.$user->photo) : url('upload/no_image.jpg') }}" 
             class="rounded-circle border border-5 border-warning shadow-lg mb-4" 
             style="width:150px; height:150px; object-fit:cover;">
        
        <h2 class="fw-black display-5 mb-2 vibe-gradient">{{ $user->name }}</h2>
        <p class="fs-4 opacity-90">{{ $user->email }}</p>
        <p class="fs-3 mb-0">Total Points: <strong class="text-warning">{{ $user->points }}</strong></p>
        <small class="text-muted">Joined {{ $user->created_at->format('d M Y') }}</small>
    </div>

    <!-- STATS ROW -->
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="vibe-card p-4 text-center">
                <h5 class="text-warning fw-bold">Total Earnings</h5>
                <h2 class="text-success fw-black">₦12,500</h2>
                <small class="text-light">From approved tasks</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="vibe-card p-4 text-center">
                <h5 class="text-warning fw-bold">Total Points</h5>
                <h2 class="text-primary fw-black">{{ $user->points }}</h2>
                <small class="text-light">Keep completing tasks!</small>
            </div>
        </div>

        <div class="col-md-4">
            <div class="vibe-card p-4 text-center">
                <h5 class="text-warning fw-bold">Completed Tasks</h5>
                <h2 class="text-info fw-black">{{ $taskcompleted }}</h2>
                <small class="text-light">Approved submissions</small>
            </div>
        </div>
    </div>

    <div class="row g-4">

        <!-- BADGES -->
        <div class="col-lg-6">
            <div class="vibe-card p-5">
                <h4 class="text-warning fw-bold mb-4 border-start border-5 border-warning ps-3">
                    Your Badges ({{ $badges->count() }})
                </h4>

                <div class="d-flex flex-wrap justify-content-center gap-4">
                    @if($badges->count() > 0)
                        @foreach($badges as $badge)
                            <div class="text-center">
                                <img src="{{ $badge->badge_icon }}" class="badge-glow img-fluid"
                                     style="width:90px; height:90px;">
                            </div>
                        @endforeach
                    @else
                        <p class="text-center text-muted fs-4">
                            Complete tasks to unlock badges!
                        </p>
                    @endif
                </div>

            </div>
        </div>

        <!-- LEVEL PROGRESS -->
        <div class="col-lg-6">
            <div class="vibe-card p-5">
                <h4 class="text-warning fw-bold mb-4 border-start border-5 border-warning ps-3">Level Progress</h4>

                @if($user->points < 1000)
                    @php 
                        $progress = ($user->points / 1000) * 100; 
                        $needed = 1000 - $user->points; 
                    @endphp

                    <p class="fw-bold fs-3 text-white">Current Level:
                        <span class="text-secondary">Bronze</span>
                    </p>

                    <div class="progress-vibe mb-3">
                        <div class="bg-secondary" style="width: {{ $progress }}%; height:100%;"></div>
                    </div>

                    <p class="fs-5 text-white">
                        Next: <strong class="text-silver">Silver</strong> • Need {{ $needed }} pts
                    </p>

                @elseif($user->points < 1500)
                    @php 
                        $progress = (($user->points - 1000) / 500) * 100; 
                        $needed = 1500 - $user->points; 
                    @endphp

                    <p class="fw-bold fs-3 text-white">Current Level:
                        <span class="text-silver">Silver</span>
                    </p>

                    <div class="progress-vibe mb-3">
                        <div class="bg-secondary" style="width: {{ $progress }}%; height:100%;"></div>
                    </div>

                    <p class="fs-5 text-white">Next: <strong class="text-warning">Gold</strong> • Need {{ $needed }} pts</p>

                @elseif($user->points < 2500)
                    @php 
                        $progress = (($user->points - 1500) / 1000) * 100; 
                        $needed = 2500 - $user->points; 
                    @endphp

                    <p class="fw-bold fs-3 text-white">Current Level:
                        <span class="text-warning">Gold</span>
                    </p>

                    <div class="progress-vibe mb-3">
                        <div class="bg-warning" style="width: {{ $progress }}%; height:100%;"></div>
                    </div>

                    <p class="fs-5 text-white">Next: <strong class="text-info">Diamond</strong> • Need {{ $needed }} pts</p>

                @else
                    <p class="fw-bold fs-3 text-white">
                        Current Level: <span class="text-info">Diamond</span>
                    </p>

                    <div class="progress-vibe mb-3">
                        <div class="bg-info" style="width: 100%; height:100%;"></div>
                    </div>

                    <p class="text-success fs-4">Maximum level achieved!</p>
                @endif
            </div>
        </div>
    </div>

    <!-- LEADERBOARD -->
    <div class="dashboard-card mt-4">
        <h5 class="section-title mb-4 text-dark">🏆 Leaderboard</h5>

        @foreach($leaders as $index => $leader)
            <div class="leaderboard-item hover-shadow d-flex align-items-center p-3 bg-white">

                <div class="rank-number me-3">{{ $index + 1 }}</div>

                <img class="wd-50 ht-50 rounded-circle"
                     src="{{ url('upload/'.$leader->photo) }}"
                     onerror="this.onerror=null; this.src='{{ url('upload/no_image.jpg') }}';"
                     alt="profile Image">

                <div class="flex-grow-1 ms-3">
                    <div class="fw-semibold">{{ $leader->name }}</div>
                    <small class="text-muted">{{ $leader->points }} Pts</small>
                </div>

                @if($leader->id == $user->id)
                    <span class="badge bg-warning px-3 py-2">You</span>
                @endif

            </div>
        @endforeach
    </div>

    <!-- UPCOMING REWARDS -->
    <div class="vibe-card text-center p-5 mt-4" 
         style="background: linear-gradient(45deg, #6a11cb, #2575fc);">
        <h4 class="text-white fw-bold mb-4">Upcoming Rewards</h4>
        
        <div class="row text-white fs-5">
            <div class="col-md-4">Silver at 1000 Points</div>
            <div class="col-md-4">Gold at 1500 Points</div>
            <div class="col-md-4">Diamond at 2500 Points</div>
        </div>
    </div>

</div>
@endsection
