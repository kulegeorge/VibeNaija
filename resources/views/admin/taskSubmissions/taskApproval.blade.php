@section('title')
  Task Approval
@endsection
@extends('admin.admin_dashboard_new')
@section('admin2')

<!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->

    {{-- CHECK IF EMPTY --}}
    @if($submissions->isEmpty())
        <div class="alert alert-warning text-center fw-bold rounded-3 py-4 shadow-sm">
            ⚠ No Submissions Found
        </div>
    @endif


    @foreach ($submissions as $submission)

    <div class="card card shadow-sm  border-1 border-secondary  mb-4 overflow-hidden">

        <!-- HEADER -->
        <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0 fw-bold text-white">{{ $submission->task->taskname ?? 'Task Not Found' }}</h5>
                <small class="opacity-75">
                    Submitted by: {{ $submission->user->name ?? 'Unknown User' }}
                </small>
            </div>

            <span class="badge fs-6
                @if($submission->status == 'approved') bg-success
                @elseif($submission->status == 'rejected') bg-danger
                @else bg-danger text-white
                @endif
            ">
                {{ ucfirst($submission->status ?? 'pending') }}
            </span>
        </div>

        <!-- BODY -->
        <div class="card-body">

            <!-- USER EXPLANATION -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">User Explanation</h6>
                <div class="p-3 bg-light border rounded">
                    {{ $submission->user_text ?? 'No explanation provided.' }}
                </div>
            </div>

            <!-- VIDEO -->
            @if(!empty($submission->video_url))
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">URL Link</h6>
                <a href="{{ $submission->video_url }}" target="_blank"
                   class="d-inline-block mt-2 fw-semibold text-primary">
                    🔗 {{ $submission->video_url }}
                </a>
            </div>
            @endif

            <!-- IMAGES -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">Images</h6>

                @php
                    $images = is_array($submission->images)
                        ? $submission->images
                        : json_decode($submission->images ?? '[]', true);
                @endphp

                @if(!empty($images))
                    <div class="d-flex flex-wrap gap-3 mt-2">
                        @foreach($images as $img)
                            <div class="border rounded shadow-sm p-1 bg-white" style="width: 130px;">
                                <img src="{{ asset($img) }}"
                                     class="w-100 rounded"
                                     style="height:120px; object-fit:cover;">
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted">No images were submitted.</p>
                @endif
            </div>



            <!-- DOCUMENTS -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">Documents</h6>

                @php
                    $docs = is_array($submission->documents)
                        ? $submission->documents
                        : json_decode($submission->documents ?? '[]', true);
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

            <!-- POINTS -->
            <div class="mb-4">
                <h6 class="fw-bold text-uppercase text-secondary small">Task Points</h6>
                <div class="p-3 alert-success border rounded text-center">
                    <span class="fw-bold display-6 text-primary">
                        {{ $submission->task->task_points ?? 0 }}
                    </span>
                    <span class="fw-bold">Points</span>
                </div>
            </div>
 <form id="decisionForm" method="POST">
    @csrf

    <div class="mb-4">
        <h6 class="fw-bold text-uppercase text-secondary small">
            <strong>Approval or Rejection Messages</strong>
        </h6>
        <div class="p-3 bg-white border rounded text-center">
            <textarea name="decision_message" class="form-control"
                placeholder="Write a message for {{ $submission->user->name ?? 'Unknown User' }}">
                {{ old('decision_message') }}
            </textarea>
        </div>
    </div>

    <!-- ACTION BUTTONS -->
    <div class="text-center mt-4">

        @if(($submission->status ?? 'pending') == 'pending')

            <button type="submit"
                    class="btn btn-success px-4 py-2 rounded-pill shadow-sm"
                    onclick="submitToRoute('{{ route('admin.approve.submission', $submission->id) }}')">
                ✔ Approve Submission
            </button>

            <button type="submit"
                    class="btn btn-danger px-4 py-2 rounded-pill shadow-sm ms-2"
                    onclick="submitToRoute('{{ route('admin.reject.submission', $submission->id) }}')">
                ✖ Reject Submission
            </button>

        @else
            <div class="alert alert-info mt-3 fw-bold">
                This submission has already been {{ $submission->status }}.
            </div>
        @endif

    </div>
</form>

        </div>
 
    </div>

    @endforeach

</div>
<script>
function submitToRoute(route) {
    document.getElementById('decisionForm').action = route;
}
</script>

@endsection
