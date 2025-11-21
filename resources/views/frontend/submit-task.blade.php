@extends('admin.admin_dashboard')
@section('admin')

<style>
/* --- Drag & Drop Style --- */
.dropzone {
    border: 2px dashed #6c63ff;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    background: #f8f9ff;
    cursor: pointer;
    transition: 0.3s;
}

.dropzone.dragover {
    background: #e0e5ff;
    border-color: #4a47d5;
}

.dropzone i {
    font-size: 45px;
    color: #6c63ff;
}

.preview-list {
    margin-top: 10px;
}
.preview-item {
    font-size: 14px;
    padding: 6px 10px;
    background: #f1f1f1;
    border-radius: 6px;
    margin-bottom: 5px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}
.preview-item span {
    font-weight: bold;
}
</style>

<div class="container my-5" style="padding-top:80px;">

    <!-- Page Title -->
    <div class="text-center mb-4">
        <h2 class="fw-bold">{{ $task->taskname }}</h2>
        <p class="text-muted">{{ $task->task_description }}</p>

        <span class="badge bg-info text-dark px-3 py-2">Category: {{ $task->category }}</span>
        <span class="badge bg-primary px-3 py-2">Points: {{ $task->task_points }}</span>
        <span class="badge bg-success px-3 py-2">Duration: {{ $task->duration }}</span>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">📘 Submission Instruction</h5>
                    <small class="text-muted">Follow the instructions below and upload your evidence.</small>
                </div>

                <div class="card-body">

                    <form action="{{ route('submit.user.task', $task->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Instructions Block -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Task Instructions</label>
                            <div class="p-3 bg-light rounded border">
                                {!! nl2br(e($task->submission_instruction)) !!}
                            </div>
                        </div>

                        <!-- Text Description -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Write your Answer (Optional)</label>
                            <textarea name="user_text" class="form-control" rows="4" placeholder="Describe how you completed the task..."></textarea>
                        </div>

                        <!-- Video URL -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Video URL (Optional)</label>
                            <input type="text" name="video_url" class="form-control" placeholder="Paste a YouTube / TikTok / Instagram Video link">
                        </div>

                        <!-- DRAG & DROP UPLOAD AREA -->
                     <!-- IMAGES UPLOAD -->
<div class="mb-4">
    <label class="form-label fw-bold">Upload Images</label>

    <div id="imgDropzone" class="dropzone">
        <i class="fas fa-cloud-upload-alt mb-2"></i>
        <p class="mb-1 fw-bold">Drag & Drop images here</p>
        <p class="text-muted">or click to select images</p>
        <input type="file" id="imageInput" name="images[]" multiple hidden accept="image/*">
    </div>

    <div id="imagePreview" class="preview-list"></div>
</div>


<!-- DOCUMENT UPLOAD -->
<div class="mb-4">
    <label class="form-label fw-bold">Upload Documents</label>

    <div id="docDropzone" class="dropzone">
        <i class="fas fa-cloud-upload-alt mb-2"></i>
        <p class="mb-1 fw-bold">Drag & Drop documents here</p>
        <p class="text-muted">or click to select files</p>
        <input type="file" id="docInput" name="documents[]" multiple hidden
               accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip">
    </div>

    <div id="docPreview" class="preview-list"></div>
</div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                                Submit Task
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

<!-- DRAG & DROP SCRIPT -->

<!-- Success Enrollment Modal -->
<div class="modal fade" id="submitSuccessModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-body text-center p-4">

                <!-- Success Icon -->
                <div class="mb-3" style="font-size: 40px; color: #28a745;">
                    ✔️
                </div>

                <h4 class="fw-bold mb-2">Submission Successful</h4>

                <p class="text-muted mb-4">
                    You have successfully submitted your responses. You can take another at any time.
                </p>

                <button class="btn btn-success px-4 py-2 rounded-pill" data-bs-dismiss="modal">
                    Continue
                </button>
            </div>

        </div>
    </div>
</div>


<!-- Auto-trigger Script -->
@if(session('submission_success'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var submitsuccessModal = new bootstrap.Modal(document.getElementById('submitSuccessModal'));
        submitsuccessModal.show();
    });
</script>
@endif
@if(session('submission_failed'))
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var submiterrorModal = new bootstrap.Modal(document.getElementById('submitErrorModal'));
        submiterrorModal.show();
    });
</script>


@endif
<script>
function setupDropzone(dropzoneId, inputId, previewId) {
    const dropzone = document.getElementById(dropzoneId);
    const fileInput = document.getElementById(inputId);
    const preview = document.getElementById(previewId);

    dropzone.addEventListener("click", () => fileInput.click());

    dropzone.addEventListener("dragover", e => {
        e.preventDefault();
        dropzone.classList.add("dragover");
    });

    dropzone.addEventListener("dragleave", () => {
        dropzone.classList.remove("dragover");
    });

    dropzone.addEventListener("drop", e => {
        e.preventDefault();
        dropzone.classList.remove("dragover");
        fileInput.files = e.dataTransfer.files;
        displayFiles(e.dataTransfer.files);
    });

    fileInput.addEventListener("change", function () {
        displayFiles(this.files);
    });

    function displayFiles(files) {
        preview.innerHTML = "";
        Array.from(files).forEach(file => {
            let div = document.createElement("div");
            div.classList.add("preview-item");
            div.innerHTML = `
                <span>${file.name}</span>
                <small>${(file.size / 1024 / 1024).toFixed(2)} MB</small>
            `;
            preview.appendChild(div);
        });
    }
}

document.addEventListener("DOMContentLoaded", function () {
    setupDropzone("imgDropzone", "imageInput", "imagePreview");
    setupDropzone("docDropzone", "docInput", "docPreview");
});
</script>

@endsection
