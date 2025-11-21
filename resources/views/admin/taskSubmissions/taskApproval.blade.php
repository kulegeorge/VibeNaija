@extends('admin.admin_dashboard')
@section('admin')

<div class="container my-5" style="padding-top:80px;">

    @foreach ($submissions as $submission)

    <div class="card shadow-sm border-0 mb-5 rounded-3 overflow-hidden">

        <!-- HEADER -->
        <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold">{{ $submission->task->taskname }}</h5>
                <small class="opacity-75">
                    Submitted by: {{ $submission->user->name }}
                </small>
            </div>

            <span class="badge fs-6
                @if($submission->status == 'approved') bg-success
                @elseif($submission->status == 'rejected') bg-danger
                @else bg-warning text-dark
                @endif
            ">
                {{ ucfirst($submission->status) }}
            </span>
        </div>

        <!-- BODY -->
        <div class="card-body">

            <!-- SECTION: USER EXPLANATION -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">User Explanation</h6>
                <div class="p-3 bg-light border rounded">
                    {{ $submission->user_text ?? 'No explanation provided.' }}
                </div>
            </div>

            <!-- SECTION: VIDEO -->
            @if($submission->video_url)
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">Video Link</h6>
                <a href="{{ $submission->video_url }}" target="_blank"
                   class="d-inline-block mt-2 fw-semibold text-primary">
                    🔗 {{ $submission->video_url }}
                </a>
            </div>
            @endif

            <!-- SECTION: IMAGES -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">Images</h6>

                @php
                    $images = is_array($submission->images)
                        ? $submission->images
                        : json_decode($submission->images, true);
                @endphp

                @if(!empty($images))
                    <div class="d-flex flex-wrap gap-3 mt-2">
                        @foreach($images as $img)
                            <div class="border rounded shadow-sm p-1 bg-white" style="width: 130px;">
                                <img src="{{ asset($img) }}" class="w-100 rounded" style="height:120px; object-fit:cover;">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No images were submitted.</p>
                @endif
            </div>

            <!-- SECTION: DOCUMENTS -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">Documents</h6>

                @php
                    $docs = is_array($submission->documents)
                        ? $submission->documents
                        : json_decode($submission->documents, true);
                @endphp

                @if(!empty($docs))
                    <div class="bg-light border p-3 rounded">
                        <ul class="mb-0">
                            @foreach($docs as $doc)
                                <li class="mb-1">
                                    <a href="{{ asset($doc) }}" target="_blank" class="fw-semibold">
                                        📄 {{ basename($doc) }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <p class="text-muted">No documents were submitted.</p>
                @endif
            </div>

            <!-- SECTION: POINTS -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">Task Points</h6>
                <div class="p-3 bg-white border rounded text-center">
                    <span class="fw-bold display-6 text-primary">{{ $submission->task->task_points }}</span>
                    <span class="fw-bold">Points</span>
                </div>
            </div>

            <!-- ACTION BUTTONS -->
            <div class="text-center mt-4">

                @if($submission->status == 'pending')

                    <form action="{{ route('admin.approve.submission', $submission->id) }}"
                          method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-success px-4 py-2 rounded-pill shadow-sm">
                            ✔ Approve Submission
                        </button>
                    </form>

                    <form action="{{ route('admin.reject.submission', $submission->id) }}"
                          method="POST" class="d-inline ms-2">
                        @csrf
                        <button class="btn btn-danger px-4 py-2 rounded-pill shadow-sm">
                            ✖ Reject Submission
                        </button>
                    </form>

                @else
                    <div class="alert alert-info mt-3 fw-bold">
                        This submission has already been {{ $submission->status }}.
                    </div>
                @endif

            </div>

        </div>

    </div>

    @endforeach

</div>

@endsection
