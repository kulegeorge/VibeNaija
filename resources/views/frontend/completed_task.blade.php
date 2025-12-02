@extends('admin.admin_dashboard')
@section('admin')

<style>
.completed-watermark {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) rotate(-25deg);
    font-size: 60px;
    color: rgba(0,0,0,0.1);
    font-weight: 900;
    pointer-events: none;
    user-select: none;
    white-space: nowrap;
}
.card.completed-card {
    position: relative;
    overflow: hidden;
}
</style>

<div class="container" style="padding-top:80px;">
    <div class="row">

        @foreach($tasks as $task)
        @if($completed->contains($task->id))
        <div class="col-md-4 col-sm-6 mb-4">

            <a href="{{ route('task.show', encrypt($task->id)) }}" class="text-decoration-none text-dark">
                <div class="card shadow-sm border rounded-3 h-100 completed-card" style="background:#f1f3f5;">

                    <!-- WATERMARK -->
                    <div class="completed-watermark">COMPLETED</div>
@php
    $duration = $task->duration;

    if ($duration < 7) {
        $duration_text = $duration . ' day' . ($duration > 1 ? 's' : '');
    } elseif ($duration < 30) {
        $weeks = floor($duration / 7);
        $duration_text = $weeks . ' week' . ($weeks > 1 ? 's' : '');
    } else {
        $months = floor($duration / 30);
        $duration_text = $months . ' month' . ($months > 1 ? 's' : '');
    }
@endphp
            <!-- CARD HEADER -->
            <div class="card-header bg-white border-0 pb-0">
                <h6 class="fw-bold mb-1">{{ $task->taskname }}</h6>
                <small class="text-muted">{{ $task->category }} • <strong>Time: {{ $duration_text }} <span id="timer-{{ $task->id }}" data-end="{{ $task->end_time }}"></span>

                </strong>
            </small>


            </div>

                    <!-- IMAGE -->
                    @php
                        $thumb = null;

                        if ($task->images) {
                            $images = json_decode($task->images);
                            if (!empty($images)) {
                                $thumb = asset('uploads/tasks/' . $images[0]);
                            }
                        }

                        if (!$thumb && $task->url) {
                            preg_match(
                                '/(?:youtu\\.be\\/|youtube\\.com\\/(?:embed\\/|v\\/|watch\\?v=|watch\\?+.&v=))([A-Za-z0-9_-]{11})/',
                                $task->url,
                                $matches
                            );
                            if (!empty($matches[1])) {
                                $youtubeId = $matches[1];
                                $thumb = "https://img.youtube.com/vi/$youtubeId/hqdefault.jpg";
                            }
                        }

                        if (!$thumb) {
                            $thumb = asset('images/default-task.jpg');
                        }
                    @endphp

                    <img src="{{ $thumb }}" class="card-img-top" alt="Task Image"
                        style="height:180px; object-fit:cover; border-radius:0; opacity: 0.1;">

                    <!-- CARD BODY -->
                    <div class="card-body">
                        <p class="small text-muted mb-2">
                            {{ Str::limit($task->task_description, 80) }}
                        </p>

                        <div class="d-flex flex-wrap gap-1">
                            <span class="badge bg-light text-dark border">
                                ⭐ {{ $task->task_points }} pts
                            </span>

                            <span class="badge bg-light text-dark border">
                                {{ $task->badge_name ?? 'Badge' }}
                            </span>

                            <span class="badge bg-light text-dark border">
                                {{ $task->task_level ?? 'Level' }}
                            </span>
                        </div>
                    </div>

                    <!-- CARD FOOTER -->
                    <div class="card-footer bg-white border-0 text-end">
                        <button class="btn btn-secondary btn-sm float-start">
                            Completed  <i class="fa fa-user-check"></i>
                        </button>
          @php
    $isExpired = now()->greaterThan($task->end_time);
@endphp


               @if(!$isExpired)
                        <a href="{{ route('task.show', encrypt($task->id)) }}" class="btn btn-outline-primary btn-sm">
                            View Task →
                        </a>

                        @else
<a href="{{ route('task.show', encrypt($task->id))}}" class="btn btn-warning btn-sm">
                   Task Expired →
                </a>
                        @endif

                    </div>

                </div>
            </a>

        </div>
        @endif
        @endforeach
    </div>

    <!-- Success Enrollment Modal -->
    <div class="modal fade" id="enrollSuccessModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-center p-4">
                    <div class="mb-3" style="font-size: 40px; color: #28a745;">
                        ✔️
                    </div>

                    <h4 class="fw-bold mb-2">Enrollment Successful</h4>

                    <p class="text-muted mb-4">
                        You have successfully enrolled in this task. You can now begin at any time.
                    </p>

                    <button class="btn btn-success px-4 py-2 rounded-pill" data-bs-dismiss="modal">
                        Continue
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Enrollment Failed Modal -->
    <div class="modal fade" id="enrollErrorModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-center p-4">
                    <div class="mb-3" style="font-size: 40px; color: #dc3545;">
                        ❌
                    </div>

                    <h4 class="fw-bold mb-2">Enrollment Failed</h4>

                    <p class="text-muted mb-4">
                        Something went wrong while enrolling in this task.
                        Please try again later.
                    </p>

                    <button class="btn btn-danger px-4 py-2 rounded-pill" data-bs-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Auto-trigger Script -->
    @if(session('enrolled'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var successModal = new bootstrap.Modal(document.getElementById('enrollSuccessModal'));
            successModal.show();
        });
    </script>
    @endif

    @if(session('enroll_failed'))
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var errorModal = new bootstrap.Modal(document.getElementById('enrollErrorModal'));
            errorModal.show();
        });
    </script>
    @endif

</div>
<script>
    function startCountdown(taskId, endTime) {
        const timerEl = document.getElementById("timer-" + taskId);

        function updateTimer() {
            let now = new Date().getTime();
            let end = new Date(endTime).getTime();
            let diff = end - now;

            if (diff <= 0) {
                timerEl.innerHTML = "<span class='text-danger fw-bold'>Expired</span>";
                return;
            }

           
            let hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            let minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
            let seconds = Math.floor((diff % (1000 * 60)) / 1000);

            timerEl.innerHTML =
                
                hours + " hours " +
                minutes + "m " +
                seconds + "s ";
        }

        updateTimer();
        setInterval(updateTimer, 1000);
    }

    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll("[id^='timer-']").forEach(el => {
            startCountdown(
                el.id.replace("timer-", ""),
                el.dataset.end
            );
        });
    });
</script>
@endsection
