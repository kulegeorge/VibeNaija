@extends('admin.admin_dashboard')
@section('admin')

<div class="container py-5" style="padding-top:80px;">
    <h2 class="fw-bold mb-4">📑 My Task Submissions</h2>

    @if($submissions->count() == 0)
        <div class="alert alert-info">
            You have not submitted any tasks yet.
        </div>
    @endif

    @foreach($submissions as $submission)
    <div class="card shadow-sm  border-1 border-secondary  mb-4" style="border 2px solid #dcdcdc;">
        <div class="card-header">
            
            <h5 class="fw-bold">{{ $submission->task->taskname }}</h5>

            <p class="text-muted mb-2">
                Submitted on: {{ $submission->created_at->format('d M, Y h:i A') }}
            </p>

            <!-- STATUS -->
            <span class="badge 
                @if($submission->status == 'approved') bg-success 
               
                @elseif($submission->status == 'rejected') bg-danger
                @else bg-warning text-dark 
                @endif 
                px-3 py-2">
                {{ ucfirst($submission->status) }}
            </span>
<span class="badge float-end">
     @if(!empty($submission->badge_icon))

     <img src="{{ asset($submission->badge_icon)}}" class="img-responsive" width="100" height="100">
     @endif
</span>
        </div>
        <div class="card-body">

            <!-- TEXT -->
            @if($submission->user_text)
            <p><strong>Your Explanation:</strong></p>
            <div class="p-3 bg-light rounded border mb-3">
                {{ $submission->user_text }}
            </div>
            @endif

            <!-- VIDEO -->
            @if($submission->video_url)
            <p><strong>Video URL:</strong></p>
            <a href="{{ $submission->video_url }}" target="_blank">
                {{ $submission->video_url }}
            </a>
            @endif

            <div class="row mt-3">

                <!-- Images -->
              

                <!-- Documents -->
     @php
    $images = is_array($submission->images)
                ? $submission->images
                : json_decode($submission->images, true);
@endphp

<div class="d-flex flex-wrap gap-2 mt-2">
    @if(!empty($images))
        @foreach($images as $img)
            <img src="{{ asset($img) }}"
                 class="rounded border"
                 style="width:100px; height:100px; object-fit:cover;">
        @endforeach
    @endif
</div>

@php
    $documents = is_array($submission->documents)
                ? $submission->documents
                : json_decode($submission->documents, true);
@endphp

   @if(!empty($documents))
    <div class="col-md-6">
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

             <!-- EDIT BUTTON (if still pending) -->
                    @if($submission->status == 'pending')
                    <a href="{{ route('editSubmission.task', $submission->id) }}" 
                       class="btn btn-outline-primary btn-sm rounded-pill">
                        Edit Submission
                    </a>
                    @endif

        </div>
    </div>
    @endforeach

</div>

<!-- Enrollment Failed Modal -->
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

