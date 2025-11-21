@extends('admin.admin_dashboard')
@section('admin')

<style>
/* === YOUR ORIGINAL STYLES (unchanged) === */


/* === IMPROVEMENTS ADDED === */
.header-image-preview {
    width: 60px;
    height: 60px;
    object-fit: cover;
    border-radius: 6px;
    border: 2px solid #fff;
}

.task-description-box {
    background: #f9f9f9;
    border-left: 4px solid #007bff;
    padding: 10px 12px;
    border-radius: 6px;
    font-size: 14px;
}

.submission-box {
    background: #fff7e6;
    border-left: 4px solid #ffa500;
    padding: 12px;
    border-radius: 6px;
}

.reward-card {
    background: rgba(0, 0, 0, 0.01);
    border: 2px dashed #28a745;
    border-radius: 10px;
    padding: 15px;
}
</style>

<div class="container" style="padding-top:80px;">

<div class="row">
    <div class="col-sm-12">
        <div class="card">

<!-- HEADER WITH IMAGES -->
<div class="card-header bg-primary text-white">

    <div class="row align-items-center gy-3">

        <!-- LEFT: Badge + Title -->
        <div class="col-12 col-md-8 d-flex align-items-start">

            @if($task->badge_icon)
                <img src="{{ asset($task->badge_icon) }}" 
                     class="me-3 rounded flex-shrink-0"
                     style="width:50px; height:50px; object-fit:cover;">
            @endif

            <div class="flex-grow-1">
                <h4 class="mb-1">{{ $task->taskname }}</h4>
                <p class="mb-0">
                    <small class="text-white">
                        {{ $task->category }} | {{ $task->duration }}
                    </small>
                </p>
            </div>

        </div>

        <!-- RIGHT: Task Images -->
        @if($task->images)
        <div class="col-12 col-md-4">

            <div class="d-flex flex-wrap gap-2 justify-content-md-end">
                @foreach(json_decode($task->images) as $img)
                    <img src="{{ asset('uploads/tasks/'.$img) }}"
                         
                         class="shadow-sm header-image-preview">
                @endforeach
            </div>

        </div>
        @endif

    </div>

</div>


            <div class="card-body">


<!-- ORIGINAL TOP 3 BOXES (left unchanged) -->
<!-- <section class="section">
    <div class="row col-p0 max_height sm_max_height">
        <div class="col-sm-12 col-md-4">
            <div class="box-services-d box-services-e el_max_height" style="height:244px;">
                <div class="bg-overlay"></div>
                <div class="col-sm-12">
                    <h3 class="title-uppercased">Easy to use</h3>
                    <p>Lorem ipsum dolor sit amet...</p>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4" style="background:#333;">
            <div class="box-services-d box-services-e dark el_max_height" style="height:244px;">
                <div class="bg-overlay"></div>
                <div class="col-sm-12">
                    <h3 class="title-uppercased">Customizable</h3>
                    <p>Lorem ipsum dolor sit amet...</p>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-4">
            <div class="box-services-d box-services-e green el_max_height" style="height:244px;">
                <div class="bg-overlay"></div>
                <div class="col-sm-12">
                    <h3 class="title-uppercased">Clean code</h3>
                    <p>Lorem ipsum dolor sit amet...</p>
                </div>
            </div>
        </div>
    </div>
</section>
 -->



<!-- TRIAL PLAN BOX (unchanged) -->
<div class="row mb-2">
 <div class="col-lg-12">
    @if($joinedAlready)
        <div class="border card p-3">
            <button class="btn btn-secondary float-end" disabled>Already Enrolled <i class="fa fa-user-check"></i></button>
        </div>
    @else
        <div class="border card p-3">
            <a href="{{ route('enrol.task', $task->id) }}" class="btn btn-primary float-end">
                Join Challenge
            </a>
        </div>
    @endif
</div>


</div>

<hr>


<div class="row">

    <!-- TASK DESCRIPTION -->
    <div class="col-lg-8">
        <div class="border card p-3">
            <label class="form-label mb-2 pt-2">Task Description</label>
            <p class="fw-bold mb-1">Difficulty</p>
<div class="progress mb-3">
<div class="progress-bar progress-bar-animate" data-percentage="85" style="width: 85%;"><span>Wordpress 85%</span></div>
</div>

            <div class="task-description-box">
                {!! nl2br(e($task->task_description)) !!}
            </div>



        </div>


            <div class="card shadow-sm p-3 mb-4">
<h5 class="fw-bold">Estimated Completion Time</h5>
<p class="text-muted">Task Category: <strong>{{ $task->category }} </strong>Approximately <strong> {{ $task->duration }}</strong> Required to complete this Task</p>
</div>


@php
    $url = $task->url ?? '';

    // Extract YouTube ID using regex
    $youtubeId = null;

    if ($url) {
        preg_match(
            '/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([A-Za-z0-9_-]{11})/',
            $url,
            $matches
        );

        if (!empty($matches[1])) {
            $youtubeId = $matches[1];
        }
    }
@endphp

@if($youtubeId)
    <!-- YOUTUBE VIDEO FRAME -->
    <div class="card mt-3">
        <div class="card-body p-0">
            <div class="ratio ratio-16x9">
                <iframe 
                    src="https://www.youtube.com/embed/{{ $youtubeId }}?rel=0"
                    title="Task Video"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>
        </div>
    </div>

@elseif($url)
    <!-- NORMAL LINK CARD -->
    <div class="card mt-3 border-info">
        <div class="card-body">
            <h5 class="card-title">Related Link</h5>
            <a href="{{ $url }}" target="_blank" class="text-primary">
                🔗 {{ $url }}
            </a>
        </div>
    </div>
@endif

    </div>

    <!-- GAMIFIED REWARDS -->
    <div class="col-lg-4">
        <div class="border card p-3 reward-card">

            <span class="btn btn-outline-secondary mb-3">🏆 Gamified Rewards</span>

            <div class="d-flex justify-content-between mb-2">
                <div><strong>Points:</strong> <span class="badge bg-success">+{{ $task->task_points }}</span></div>
                <div><strong>Badge:</strong> <span class="badge bg-warning text-dark">{{ $task->badge_name }}</span></div>
                <div><strong>Level:</strong> <span class="badge bg-info text-dark">{{ $task->level->level_name ?? 'N/A' }}</span></div>
            </div>



        </div>
        <!-- ===================== SKILLS GAINED ===================== -->
<div class="card shadow-sm p-3 mb-4">
<h5 class="fw-bold mb-3">Skills You Gain</h5>
<span class="badge bg-info text-dark me-2 mb-2">Cultural Knowledge</span>
<span class="badge bg-info text-dark me-2 mb-2">Creativity</span>
<span class="badge bg-info text-dark me-2 mb-2">Language Skills</span>
<span class="badge bg-info text-dark me-2 mb-2">Critical Thinking</span>
</div>




<!-- ===================== SUBMISSION TYPES ===================== -->

<div class="card">
              <div class="card-header">
                <h5>Accepted Submission Formats</h5>
              </div>
              <div class="card-body pc-component">
                <div class="d-flex gap-3">
<span class="badge bg-dark p-2">📹 Video</span>
<span class="badge bg-dark p-2">📝 Text</span>
<span class="badge bg-dark p-2">📸 Photo</span>
<span class="badge bg-dark p-2">🔗 Link</span>
</div>
              </div>
            </div>



    </div>


    <!-- IMAGES PREVIEW (existing) -->
    <div class="col-lg-4 mt-3">
        <div class="border card p-3">
            @if($task->images)
                <div class="row g-2">
                    @foreach(json_decode($task->images) as $img)
                        <div class="col-6">
                            <img src="{{ asset('uploads/tasks/'.$img) }}" class="rounded" style="width:100%; height:150px; object-fit:cover;">
                        </div>
                    @endforeach
                </div>
            @endif



            <!-- ===================== STEP BY STEP TASK ===================== -->


            <div class="card">
              <div class="card-header">
                <h5>General Task Requirement</h5>
              </div>
              <div class="card-body pc-component">
                <ul>
                  <li>Read the full task description.</li>
                  <li>Gather any required materials.</li>
                  <li>Record, write, or capture your submission.</li>
                  <li>Upload your submission using the button below.</li>
                  
                </ul>
              </div>
            </div>

        </div>
    </div>


    <!-- SUBMISSION INSTRUCTIONS -->
    <div class="col-lg-8 mt-3">
          <div class="card">
              <div class="card-header">
              <h5>Submission Instructions</h5>
              </div>
              <div class="card-body pc-component">
                 @if($task->submission_instruction)
                
                <div class="submission-box">
                    {!! nl2br(e($task->submission_instruction)) !!}
                </div>
            @endif
              </div>
            </div>

           

        </div>
    </div>

</div>



<!-- ACTION BUTTONS -->
<div class="mt-4 d-flex justify-content-end">
    <a href="{{ route('user.all-task') }}" class="btn btn-outline-secondary me-2">
        <i class="fas fa-arrow-left"></i> Back
    </a>
    @if($joinedAlready)
    <a href="{{route('task.submit.page', $task->id)}}" class="btn btn-primary">
        Submit Task <i class="fa fa-paper-plane"></i>
    </a>
    @else 
        <a href=""  class="btn btn-primary disabled">
        Submit Task <i class="fa fa-paper-plane"></i></a>
    @endif
</div>

<div class="card-footer text-center">
    Posted on: {{ $task->created_at->format('M d, Y') }}
</div>

@endsection