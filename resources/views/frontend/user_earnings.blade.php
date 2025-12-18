@section('title', 'Vibe Nigeria - User Task Earnings')
@extends('admin.admin_dashboard_new')
@section('admin2')

 <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content" style="background:#f2f2f2;">
        <!-- [ breadcrumb ] start -->

        

<div class="user-profile card user-card mb-4">
          <div class="card-header border-0 p-0 pb-0">
            <div class="cover-img-block">
              <img src="{{ asset('New_Layout/assets/images/profile/bg.png') }}" alt="" class="img-fluid">
              <div class="overlay"></div>
              <div class="change-cover">
                <div class="dropdown">
                
                 
                </div>
              </div>
            </div>
          </div>
          <div class="card-body py-0">
            <div class="user-about-block m-0">
              <div class="row">
                <div class="col-md-4 text-center mt-n5">
                  <div class="change-profile text-center">
                    <div class="dropdown w-auto d-inline-block">
                      <a class="dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="profile-dp">
                          <div class="position-relative d-inline-block">
                            <img class="img-radius img-fluid wid-100" src="{{ (!empty($user->photo)) ? url('upload/'.$user->photo) : url('upload/no_image.jpg') }}" alt="User image">
                          </div>
                          <div class="overlay">
                            <span>change</span>
                          </div>
                        </div>
                        <div class="certificated-badge">
                          <i class="ti ti-rosette-discount-check-filled text-primary bg-icon"></i>
                        </div>
                      </a>
                      
                    </div>
                  </div>
                  <h5 class="mb-1">{{ $user->name }}</h5>
                  <p class="mb-2 text-muted">{{ $user->email }}</p>
                </div>
                <div class="col-md-8 mt-md-4">
                 
                </div>
              </div>
            </div>
          </div>
        </div>


<div class="row">
          <!-- [ bitcoin-wallet section ] start-->
          <div class="col-md-6 col-xl-4">
            <div class="card bg-brand-color-1 bitcoin-wallet">
              <div class="card-body">
                <h5 class="text-white mb-2">Total Points</h5>
                <h2 class="text-white mb-2 f-w-300">{{ $user->points }}</h2>
                <span class="text-white d-block">Keep completing tasks!</span>
                <i class="ti ti-user-check f-70 text-white"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="card bg-brand-color-2 bitcoin-wallet">
              <div class="card-body">
                <h5 class="text-white mb-2">Completed Tasks</h5>
                <h2 class="text-white mb-2 f-w-300">{{ $taskcompleted }}</h2>
                <span class="text-white d-block">Approved submissions</span>
                <i class="ti ti-calendar text-white f-70"></i>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-xl-4">
            <div class="card bg-primary bitcoin-wallet">
              <div class="card-body">
                <h5 class="text-white mb-2">Enrolled Task</h5>
                <h2 class="text-white mb-2 f-w-300">{{ $enrolled_count}}</h2>
                <span class="text-white d-block">Total number of enrolled Tasks</span>
                <i class="ti ti-file-check-filled text-white f-70"></i>
              </div>
            </div>
          </div>
          <!-- [ bitcoin-wallet section ] end-->

        </div>


    <div class="row g-4">

       <!-- Current Level -->
 <div class="col-lg-12">
    <div class="card project-task">
        <div class="card-body">
            <div class="row align-items-center mb-3">
                <div class="col">
                    <h5 class="m-0">
                        <i class="ph ph-note-pencil f-20 align-middle me-2"></i>
                        Level Progress
                    </h5>
                </div>
            </div>

            @if ($user->points < 1000)
                @php
                    $progress = ($user->points / 1000) * 100;
                    $needed = 1000 - $user->points;
                @endphp

                <p class="fw-bold fs-4">
                    <span class="badge text-bg-success">Current Level:</span>
                    <span class="text-secondary">Bronze</span>
                </p>

                <h6 class="text-muted mt-3 mb-2">
                    Points: {{ $user->points }} / 1000
                </h6>

                <div class="progress mb-2" style="height: 6px;">
                    <div
                        class="progress-bar bg-brand-color-1"
                        role="progressbar"
                        style="width: {{ $progress }}%;"
                        aria-valuenow="{{ $progress }}"
                        aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>

                <p class="small text-muted">
                    Next: <strong class="text-silver">Silver</strong> • Need {{ $needed }} pts
                </p>

            @elseif ($user->points < 1500)
                @php
                    $progress = (($user->points - 1000) / 500) * 100;
                    $needed = 1500 - $user->points;
                @endphp

                <p class="fw-bold fs-4">
                    Current Level:
                    <span class="text-silver">Silver</span>
                </p>

                <h6 class="text-muted mt-3 mb-2">
                    Points: {{ $user->points }} / 1500
                </h6>

                <div class="progress mb-2" style="height: 6px;">
                    <div
                        class="progress-bar bg-brand-color-1"
                        role="progressbar"
                        style="width: {{ $progress }}%;"
                        aria-valuenow="{{ $progress }}"
                        aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>

                <p class="small text-muted">
                    Next: <strong class="text-warning">Gold</strong> • Need {{ $needed }} pts
                </p>

            @elseif ($user->points < 2500)
                @php
                    $progress = (($user->points - 1500) / 1000) * 100;
                    $needed = 2500 - $user->points;
                @endphp

                <p class="fw-bold fs-4">
                    Current Level:
                    <span class="text-warning">Gold</span>
                </p>

                <h6 class="text-muted mt-3 mb-2">
                    Points: {{ $user->points }} / 2500
                </h6>

                <div class="progress mb-2" style="height: 6px;">
                    <div
                        class="progress-bar bg-brand-color-1"
                        role="progressbar"
                        style="width: {{ $progress }}%;"
                        aria-valuenow="{{ $progress }}"
                        aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>

                <p class="small text-muted">
                    Next: <strong class="text-info">Diamond</strong> • Need {{ $needed }} pts
                </p>

            @else
                @php
                    $progress = 100;
                @endphp

                <p class="fw-bold fs-4">
                    Current Level:
                    <span class="text-info">Diamond</span>
                </p>

                <div class="progress mb-2" style="height: 6px;">
                    <div
                        class="progress-bar bg-brand-color-1"
                        role="progressbar"
                        style="width: 100%;"
                        aria-valuenow="100"
                        aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>

                <p class="text-success fw-semibold">
                    🎉 Maximum level achieved!
                </p>
            @endif

        </div>
    </div>
</div>


 <!-- BADGES -->
        <div class="col-lg-12">
            <div class="card bg-brand-color-2">
              <div class="card-body">

                <div class="row d-flex align-items-center">
                  <div class="col-auto">
                
                  </div>
                  <div class="col">
                    <p><h4 class="text-white">
                    Your Badges ({{ $badges->count() }})
                </h4></p>
                    @if($badges->count() > 0)
                        @foreach($badges as $badge)
                            
                                <img src="{{ $badge->badge_icon }}" class="badge-glow img-fluid"
                                     style="width:60px; height:60px;">
                            
                        @endforeach
                    @else
                        <p class="text-center text-white fs-4">
                           <i> Complete tasks to unlock badges!</i>
                        </p>
                    @endif
                  </div>
                </div>
              </div>
            </div>
          


            
        </div>

       
<div class="dashboard-card mt-4">
        <h5 class="section-title mb-4 text-dark">🏆 Leaderboard</h5>

       

      <div class="row">
    <div class="col-lg-12">
        <div class="card user-profile-list">
            <div class="card-body p-0">
                <div class="dt-responsive table-responsive">
                    <table id="user-list-table" class="table nowrap align-middle mb-0">
                        <tbody>
                            @foreach($leaders as $index => $leader)
                                <tr>
                                    <td
                                         @if($leader->id === $user->id)
                                            style="background: linear-gradient(-135deg, #1abc9c, #16a085);"
                                        @endif 
                                        >
                                    
                                        <div class="d-flex align-items-center gap-3">
                                            <img
                                                src="{{ url('upload/' . $leader->photo) }}"
                                                onerror="this.onerror=null;this.src='{{ url('upload/no_image.jpg') }}';"
                                                alt="Profile Image"
                                                class="rounded-circle"
                                                style="width:40px;height:40px;object-fit:cover;"
                                            >

                                            <div>
                                                 
                                    
                                                <h6 class="mb-0 fw-semibold" @if($leader->id === $user->id)
                                                      style="color:#fff;"   @endif>                                            
                                                      {{ $leader->name }}
                                       
                                                    
                                                </h6>
                                                <small class="{{ $leader->id === $user->id ? 'text-white' : 'text-muted' }}">
                                                {{ $leader->points }} Pts
                                                </small>

                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>

</div>
@endsection