@section('title')
  Edit - {{ old('taskname', $task->taskname) }}
@endsection
@extends('admin.admin_dashboard')
@section('admin')

<div class="container" style="padding-top:80px;">

    <div class="row">
        <div class="col-lg-12">

            <!-- Edit Task Card -->
            <div class="card">
                <div class="card-header">
                    <h5>Edit Task</h5>
                </div>

                <div class="card-body">
                    <form id="TaskForm" action="{{ route('admin.update-task', $task->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST') {{-- or PUT if you want method spoofing --}}

                        <!-- Task Name & Description -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Task Name:</label>
                                    <input type="text" name="taskname" class="form-control" value="{{ old('taskname', $task->taskname) }}">
                                    <small class="form-text text-muted">Please enter Task Name</small>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Task Description:</label>
                                    <textarea type="text" name="task_description" class="form-control" value="">{{ old('task_description', $task->task_description) }}</textarea>
                                    <small class="form-text text-muted">Please enter your Task Description</small>
                                </div>
                            </div>
                        </div>

                        <!-- Category, URL, Points -->
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Task Category:</label>
                                    <div class="input-group search-form">
                                        <input type="text" name="category" class="form-control" value="{{ old('category', $task->category) }}">
                                    </div>
                                    <small class="form-text text-muted">Culture|Music|Fashion|Language etc</small>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Task URL:</label>
                                    <div class="input-group search-form">
                                        <input type="text" name="url" class="form-control" value="{{ old('url', $task->url) }}">
                                    </div>
                                    <small class="form-text text-muted"><i>Links to help understand Task the more</i></small>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Task Points:</label>
                                    <div class="input-group search-form">
                                        <input type="number" name="task_points" class="form-control" value="{{ old('task_points', $task->task_points) }}">
                                    </div>
                                    <small class="form-text text-muted">Please enter Task Points</small>
                                </div>
                            </div>
                        </div>

                        <!-- Badge, Level, Duration -->
                        <div class="mb-3 row">
                            <div class="col-lg-4">
                                <label class="form-label">Badges & Points</label>
                                <small class="form-text text-muted"><i>Badge earned After Task completion</i></small>
{{-- Hidden: store the selected badge image filename (hidden from user) --}}
<input type="hidden" name="badge_icon" id="badge_icon" value="{{ old('badge_icon', $task->badge_icon) }}">

                               @foreach($badge as $badges)
<div class="form-check">
        <input
            type="radio"
            id="badge_{{ $badges->id }}"
            name="badge_name"
            value="{{ $badges->badge_name }}"
            class="form-check-input badge-radio"
            data-image="{{ $badges->badge_image }}"
            @if(old('badge_name', $task->badge_name) == $badges->badge_name) checked @endif
        >
        <label class="form-check-label" for="badge_{{ $badges->id }}">
            {{ $badges->badge_name }}
        </label>
    </div>
@endforeach

                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Task Levels</label>
                                <small class="form-text text-muted"><i>Select Level appropriate for Task</i></small>

                                @foreach($level as $levels)
<div class="form-check">
    <input type="radio" 
           id="level_{{ $levels->id }}" 
           name="task_level" 
           value="{{ $levels->level_name }}" 
           class="form-check-input"
           @if($task->task_level == $levels->level_name) checked @endif>

    <label class="form-check-label" for="level_{{ $levels->id }}">
        {{ $levels->level_name }}
    </label>

    <input type="hidden" 
           name="level_image[{{ $levels->level_name }}]" 
           value="{{ $levels->level_image }}">
</div>
@endforeach

                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Task Duration</label>
                                <small class="form-text text-muted"><i>Select how long Task will last</i></small>

                                <select name="duration" class="form-select form-select-sm">
    

    <option value="7"  @if($task->duration == 7) selected @endif>1 Week</option>
    <option value="14" @if($task->duration == 14) selected @endif>2 Weeks</option>
    <option value="21" @if($task->duration == 21) selected @endif>3 Weeks</option>
    <option value="28" @if($task->duration == 28) selected @endif>4 Weeks</option>
    <option value="35" @if($task->duration == 35) selected @endif>5 Weeks</option>
    <option value="42" @if($task->duration == 42) selected @endif>6 Weeks</option>
    <option value="49" @if($task->duration == 49) selected @endif>7 Weeks</option>
    <option value="56" @if($task->duration == 56) selected @endif>8 Weeks</option>
    <option value="63" @if($task->duration == 63) selected @endif>9 Weeks</option>
    <option value="70" @if($task->duration == 70) selected @endif>10 Weeks</option>
    <option value="77" @if($task->duration == 77) selected @endif>11 Weeks</option>
    <option value="84" @if($task->duration == 84) selected @endif>12 Weeks</option>
</select>


                                <div class="mt-4">
                               
                                <label class="form-label">Select Quiz</label>
                                <small class="form-text text-muted"><i>Test to be completed by User</i></small>
                                                              <div class="form-check mb-2">
                                    
    <input type="radio"
           id="none"
           name="topic_id"
           value=""
           class="form-check-input " checked
          >   

    <label class="form-check-label" for="none">None</label>
</div>

                                

@foreach($topics as $topic)
    <div class="form-check">
        <input type="radio" 
               id="topic_{{ $topic->id }}" 
               name="topic_id" 
               value="{{ $topic->id }}" 
               class="form-check-input"
               @if($task->topic_id == $topic->id) checked @endif>

        <label class="form-check-label" for="topic_{{ $topic->id }}">
            {{ $topic->name }}
        </label>
    </div>
@endforeach


</div>
                            </div>
                        </div>

                </div>
            </div>

            <!-- Instructions & Images -->
            <div class="card">
                <div class="card-header">
                    <h5>Task Submission Instruction</h5>
                </div>

                <div class="card-body">
                    <div class="row">

                        <!-- Instructions -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Submission Instruction</label>
                                <textarea class="form-control border rounded" name="submission_instruction" rows="5" style="white-space: pre-wrap;">{{ old('submission_instruction', $task->submission_instruction) }}</textarea>
                            </div>
                        </div>

                        <!-- Existing Images -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Existing Images</label>
                                <div class="mb-2">
                                    @if($task->images)
                                        @foreach(json_decode($task->images) as $img)
                                            <img src="{{ asset('uploads/tasks/'.$img) }}" width="80" height="80" style="object-fit:cover;margin-right:5px;">
                                        @endforeach
                                    @endif
                                </div>

                                <label class="form-label">Add New Images</label>
                                <div id="fileInputs">
                                    <div class="input-group search-form mb-2">
                                        <input type="file" name="files[]" class="form-control" multiple>
                                    </div>
                                    <small class="form-text text-muted">You can select multiple images at once.</small>
                                </div>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="col-lg-12">
                            <div class="border card p-3">
                                <button type="submit" name="submit" class="btn btn-outline-primary">
                                    Update Task
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

            </form> <!-- Correct closing -->

        </div>
    </div>

</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    // Badges
    const badgeRadios = document.querySelectorAll('.badge-radio');
    const badgeImageField = document.getElementById('badge_icon');

    badgeRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            // update hidden input with the image linked to the selected badge
            badgeImageField.value = this.dataset.image || '';
        });
    });

    // Levels
    const levelRadios = document.querySelectorAll('.level-radio');
    const levelImageField = document.getElementById('level_image');

    levelRadios.forEach(radio => {
        radio.addEventListener('change', function () {
            levelImageField.value = this.dataset.image || '';
        });
    });
});
</script>

<!-- JS to add more file inputs -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const fileInputsWrapper = document.getElementById('fileInputs');
    const addButton = document.getElementById('addImages');

    if(addButton){
        addButton.addEventListener('click', function () {
            let newRow = document.createElement('div');
            newRow.classList.add('input-group', 'search-form', 'mb-2');

            newRow.innerHTML = `
                <input type="file" name="files[]" class="form-control">
                <span class="input-group-text bg-danger text-white removeImage" style="cursor:pointer;">X</span>
            `;

            fileInputsWrapper.appendChild(newRow);

            newRow.querySelector('.removeImage').addEventListener('click', function () {
                newRow.remove();
            });
        });
    }
});
</script>

@endsection
