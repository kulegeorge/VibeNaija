@extends('admin.admin_dashboard')
@section('admin')

<style>
    /* GLOBAL CARD IMPROVEMENTS */
    .card {
        border-radius: 12px;
        border: 1px solid #dcdcdc !important;
    }

    .card-header {
        background: #f8f9fa;
        padding: 20px !important;
        border-bottom: 1px solid #e6e6e6;
    }

    .card-body {
        padding: 25px !important;
    }

    /* MAIN SUBMISSION CARD */
    .submission-card {
        padding: 25px !important;
    }

    /* RESULT CARD */
    .result-card {
        padding: 20px !important;
        background: #f1f5ff;
        border-radius: 10px;
        border: 1px solid #d2d9ff;
        margin-top: 20px;
    }

    .task-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }

    .task-badge-img {
        width: 90px;
        height: 90px;
        object-fit: contain;
    }
</style>


<div class="container py-5" style="padding-top:80px;">
    <h2 class="fw-bold mb-4">📑 My Task Submissions</h2>

    @if($submissions->count() == 0)
        <div class="alert alert-info">
            You have not submitted any tasks yet.
        </div>
    @endif


    @foreach($submissions as $submission)

        <div class="card shadow-sm submission-card mb-4">

            <div class="card-header d-flex justify-content-between">
                <div>
                    <h5 class="fw-bold">{{ $submission->task->taskname }}</h5>
                    <p class="text-muted mb-2">
                        Submitted on: {{ $submission->created_at->format('d M, Y h:i A') }}
                    </p>

                    <!-- STATUS BADGE -->
                    <span class="badge 
                        @if($submission->status == 'approved') bg-success
                        @elseif($submission->status == 'rejected') bg-danger
                        @else bg-warning text-dark 
                        @endif px-3 py-2">
                        {{ ucfirst($submission->status) }}
                    </span>
                </div>

                <!-- BADGE IMAGE -->
                @if(!empty($submission->badge_icon))
                    <img src="{{ asset($submission->badge_icon) }}" 
                         class="task-badge-img rounded-circle">
                @endif
            </div>


            <div class="card-body">

                {{-- APPROVED OR REJECTED NOTE --}}
                @if($submission->status == 'approved')
                    <p><strong>Task Approval Note:</strong></p>
                    <div class="p-3 bg-light rounded border mb-3">
                        {{ $submission->decision_message }}
                    </div>

                @elseif($submission->status == 'rejected')
                    <p><strong>Task Rejection Note:</strong></p>
                    <div class="p-3 alert-danger rounded border mb-3">
                        {{ $submission->decision_message }}
                    </div>
                @endif


                <!-- RESULT CARD -->
                @if($submission->score !== null)
                    <div class="card result-card">
                        <h5 class="fw-bold">{{ $submission->topic_name }} - Result</h5>
                        <p class="text-muted">{{ $submission->topic_description }}</p>

                        <h4>Score: {{ $submission->score }} / {{ $submission->total }}</h4>
                        <h4>Percentage: {{ number_format($submission->percentage, 2) }}%</h4>

                        @if ($submission->percentage >= 50)
                            <div class="alert alert-success mt-2">Congratulations! You passed.</div>
                        @else
                            <div class="alert alert-danger mt-2">You did not pass.</div>
                        @endif

                       
                    </div>
                    @elseif (is_null($submission->score) && is_null($submission->total) && is_null($submission->percentage))

    @if ($submission->status == 'pending')

        @if(!empty($submission->task->topic_id) && $submission->task->topic_id > 0 )

            <div class="card mt-3 border-info">
                <div class="card-body">
                    <h5 class="card-title">You have a Quiz</h5>

                    <p>{{ $submission->task->taskname }}</p>
                    <p>{{ $submission->task->task_description }}</p>

                    <a href="{{ route('cbt.start', [
                        'topic' => encrypt($submission->task->topic_id),
                        'task'  => encrypt($submission->task->id)
                    ]) }}" 
                       class="btn btn-sm btn-info text-white">
                        <i class="fa-solid fa-play"></i> Take CBT Exam
                    </a>
                </div>
            </div>

        @else

            <div class="card mt-3 border-info">
                <div class="card-body">
                    <h5 class="card-title">You have a Quiz</h5>
                    <p>No CBT Quiz for this Task!</p>
                </div>
            </div>

        @endif
        
    @endif


                @endif



                {{-- USER TEXT --}}
                @if($submission->user_text)
                    <p class="mt-4"><strong>Your Explanation:</strong></p>
                    <div class="p-3 bg-light rounded border mb-3">
                        {{ $submission->user_text }}
                    </div>
                @endif


                {{-- VIDEO URL --}}
                @if($submission->video_url)
                    <p><strong>Video URL:</strong></p>
                    <a href="{{ $submission->video_url }}" target="_blank">
                        {{ $submission->video_url }}
                    </a>
                @endif



                <div class="row mt-4">
                    {{-- IMAGES --}}
                    @php
                        $images = is_array($submission->images)
                            ? $submission->images
                            : json_decode($submission->images, true);
                    @endphp

                    <div class="d-flex flex-wrap gap-2 mt-2">
                        @if(!empty($images))
                            @foreach($images as $img)
                                <img src="{{ asset($img) }}"
                                     class="rounded border task-image">
                            @endforeach
                        @endif
                    </div>


                    {{-- DOCUMENTS --}}
                    @php
                        $documents = is_array($submission->documents)
                            ? $submission->documents
                            : json_decode($submission->documents, true);
                    @endphp

                    @if(!empty($documents))
                        <div class="col-md-6 mt-3">
                            <strong>Documents:</strong>
                            <ul class="mt-2">
                                @foreach($documents as $doc)
                                    <li>
                                        <a href="{{ asset($doc) }}" target="_blank">
                                            📄 {{ basename($doc) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>


                {{-- EDIT BUTTON --}}
                @if($submission->status == 'pending')
                    <a href="{{ route('editSubmission.task', encrypt($submission->id)) }}" 
                       class="btn btn-outline-primary btn-sm rounded-pill mt-4">
                        Edit Submission
                    </a>
                @endif

            </div>
        </div>

    @endforeach
</div>




<!-- ERROR MODAL -->
<div class="modal fade" id="submitErrorModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body text-center p-4">
                
                <div class="mb-3" style="font-size: 40px; color: #dc3545;">
                    ❌
                </div>

                <h4 class="fw-bold mb-2">Submission Failed</h4>

                <p class="text-muted mb-4">
                    Something went wrong while submitting this task.  
                    Please try again later.
                </p>

                <button class="btn btn-danger px-4 py-2 rounded-pill" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
