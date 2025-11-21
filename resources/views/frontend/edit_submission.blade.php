@extends('admin.admin_dashboard')
@section('admin')

<div class="container my-5" style="padding-top:80px;">

    <!-- ================================
         PAGE HEADER
    =================================== -->
    <div class="text-center mb-4">
        <h2 class="fw-bold">Update Your Submission</h2>
        <p class="text-muted">Task: {{ $task->taskname }}</p>

        <!-- Submission Status Badge -->
        <span class="badge 
            @if($submission->status == 'approved') bg-success
            @elseif($submission->status == 'rejected') bg-danger
            @else bg-warning text-dark
            @endif px-3 py-2">
            Status: {{ ucfirst($submission->status) }}
        </span>
    </div>

    <!-- ================================
         LOCKED SUBMISSION MESSAGE
    =================================== -->
    @if(in_array($submission->status, ['approved','rejected']))

        <div class="alert alert-danger text-center">
            <strong>This submission can no longer be edited.</strong><br>
            It has already been <b>{{ $submission->status }}</b>.
        </div>

        <div class="text-center">
            <a href="{{ route('user.submissions') }}" class="btn btn-secondary mt-3">
                Back to My Submissions
            </a>
        </div>

    @else

    <div class="row justify-content-center">
        <div class="col-lg-9">

            <div class="card shadow-sm border-0">
                <div class="card-header bg-white">
                    <h5 class="mb-0 fw-bold">Update Submission</h5>
                </div>

                <div class="card-body">

                    <!-- ================================
                         UPDATE FORM
                    =================================== -->
                    <form action="{{ route('update.submission', $submission->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf

                        <!-- User Explanation -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Your Explanation</label>
                            <textarea name="user_text" class="form-control" rows="4">{{ $submission->user_text }}</textarea>
                        </div>

                        <!-- Video URL -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Video URL</label>
                            <input type="text"
                                   name="video_url"
                                   class="form-control"
                                   value="{{ $submission->video_url }}"
                                   placeholder="Paste a YouTube / TikTok / Instagram Video link">
                        </div>

                        <!-- ================================
                             IMAGE UPLOAD
                        =================================== -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Replace Images</label>

                            <!-- Drag Area -->
                            <div id="image-drop-area"
                                 class="drag-area p-4 border rounded text-center bg-light"
                                 style="cursor:pointer;">
                                <p class="m-0 text-muted">Drag & drop images here or click to browse</p>
                                <input type="file"
                                       name="images[]"
                                       id="image-upload"
                                       class="d-none"
                                       multiple
                                       accept="image/*">
                            </div>

                            <!-- Previews -->
                            <small class="text-muted mt-2 d-block">New Images Selected:</small>
                            <div id="newImagePreview" class="d-flex flex-wrap mt-2"></div>

                            <!-- Current Images -->
                            <small class="text-muted mt-2 d-block">Current Images:</small>
                            @php
                                $images = is_string($submission->images)
                                    ? json_decode($submission->images, true)
                                    : ($submission->images ?? []);
                                $images = is_array($images) ? $images : [];
                            @endphp

                            <div class="d-flex flex-wrap gap-2 mt-2">
                                @foreach($images as $img)
                                    <img src="{{ asset($img) }}"
                                         class="rounded border"
                                         style="width:100px;height:100px;object-fit:cover;">
                                @endforeach
                            </div>
                        </div>

                        <!-- ================================
                             DOCUMENT UPLOAD
                        =================================== -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Replace Documents</label>

                            <!-- Drag Area -->
                            <div id="doc-drop-area"
                                 class="drag-area p-4 border rounded text-center bg-light"
                                 style="cursor:pointer;">
                                <p class="m-0 text-muted">Drag & drop documents or click to browse</p>

                                <input type="file"
                                       name="documents[]"
                                       id="doc-upload"
                                       class="d-none"
                                       multiple
                                       accept=".pdf,.doc,.docx,.ppt,.pptx,.xls,.xlsx,.zip">
                            </div>

                            <!-- New docs preview -->
                            <small class="text-muted mt-2 d-block">New Documents Selected:</small>
                            <ul id="newDocPreview" class="mt-2"></ul>

                            <!-- Current documents -->
                            <small class="text-muted mt-2 d-block">Current Documents:</small>
                            @php
                                $docs = is_string($submission->documents)
                                    ? json_decode($submission->documents, true)
                                    : ($submission->documents ?? []);
                                $docs = is_array($docs) ? $docs : [];
                            @endphp

                            @if(!empty($docs))
                                <ul class="mt-2">
                                    @foreach($docs as $doc)
                                        <li>
                                            <a href="{{ asset($doc) }}" target="_blank">
                                                📄 {{ basename($doc) }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-pill">
                                Update Submission
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

    @endif

</div>

<!-- ================================
     SCRIPT: DRAG & DROP + PREVIEW
==================================== -->
<script>
document.addEventListener("DOMContentLoaded", () => {

    /* --------------------------------------
       IMAGE UPLOAD HANDLER
    -------------------------------------- */
    const imageArea = document.getElementById("image-drop-area");
    const imageInput = document.getElementById("image-upload");
    const imagePreview = document.getElementById("newImagePreview");

    imageArea.addEventListener("click", () => imageInput.click());
    imageArea.addEventListener("dragover", e => { e.preventDefault(); imageArea.classList.add("border-primary"); });
    imageArea.addEventListener("dragleave", () => imageArea.classList.remove("border-primary"));

    imageArea.addEventListener("drop", e => {
        e.preventDefault();
        imageArea.classList.remove("border-primary");
        imageInput.files = e.dataTransfer.files;
        previewImages(e.dataTransfer.files);
    });

    imageInput.addEventListener("change", () => previewImages(imageInput.files));

    function previewImages(files) {
        imagePreview.innerHTML = "";
        [...files].forEach(file => {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.createElement("img");
                img.src = e.target.result;
                img.className = "rounded border me-2 mb-2";
                img.style.cssText = "width:100px;height:100px;object-fit:cover;";
                imagePreview.appendChild(img);
            };
            reader.readAsDataURL(file);
        });
    }

    /* --------------------------------------
       DOCUMENT UPLOAD HANDLER
    -------------------------------------- */
    const docArea = document.getElementById("doc-drop-area");
    const docInput = document.getElementById("doc-upload");
    const docPreview = document.getElementById("newDocPreview");

    docArea.addEventListener("click", () => docInput.click());
    docArea.addEventListener("dragover", e => { e.preventDefault(); docArea.classList.add("border-primary"); });
    docArea.addEventListener("dragleave", () => docArea.classList.remove("border-primary"));

    docArea.addEventListener("drop", e => {
        e.preventDefault();
        docArea.classList.remove("border-primary");
        docInput.files = e.dataTransfer.files;
        previewDocs(e.dataTransfer.files);
    });

    docInput.addEventListener("change", () => previewDocs(docInput.files));

    function previewDocs(files) {
        docPreview.innerHTML = "";
        [...files].forEach(file => {
            const li = document.createElement("li");
            li.textContent = "📄 " + file.name;
            docPreview.appendChild(li);
        });
    }

});
</script>

@endsection
