@extends('admin.admin_dashboard')
@section('admin')

<div class="container" style="padding-top:80px;">

    <div class="row">
        <div class="col-lg-12">

            <!-- Create Task Card -->
            <div class="card">
                <div class="card-header">
                    <h5>Create Task</h5>
                </div>

                <div class="card-body">
                    <form id="TaskForm" action="{{ route('store-task') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Task Name & Description -->
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Task Name:</label>
                                    <input type="text" name="taskname" class="form-control" value="{{ old('taskname') }}">
                                    <small class="form-text text-muted">Please enter New Task Name</small>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label">Task Description:</label>
                                    <textarea type="text" name="task_description" class="form-control" style="white-space: pre-wrap;" >{{ old('task_description') }}</textarea>
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
                                        <input type="text" name="category" class="form-control" value="{{ old('category') }}">
                                        <span class="input-group-text bg-transparent">
                                            <!-- ORIGINAL ICON -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-feather link-icon"><path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path><line x1="16" y1="8" x2="2" y2="22"></line><line x1="17.5" y1="15" x2="9" y2="15"></line></svg>
                                        </span>
                                    </div>
                                    <small class="form-text text-muted">Culture|Music|Fashion|Language etc</small>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Task URL:</label>
                                    <div class="input-group search-form">
                                        <input type="text" name="url" class="form-control" value="{{ old('url') }}">
                                        <span class="input-group-text bg-transparent">
                                            <!-- ORIGINAL ICON -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </span>
                                    </div>
                                    <small class="form-text text-muted"><i>Please Enter URL to help under task</i></small>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="mb-3">
                                    <label class="form-label">Task Points:</label>
                                    <div class="input-group search-form">
                                        <input type="number" name="task_points" class="form-control" value="{{ old('task_points') }}">
                                        <span class="input-group-text bg-transparent">
                                            <!-- ORIGINAL ICON -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"></path><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                        </span>
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

                                @foreach($badge as $index => $badges)
                                <div class="form-check">
                                    <input type="radio" 
                                           id="badge_{{ $badges->id }}" 
                                           name="badge_name" 
                                           value="{{ $badges->badge_name }}" 
                                           class="form-check-input"
                                           @if($index == 0) checked @endif>

                                    <label class="form-check-label" for="badge_{{ $badges->id }}">
                                        {{ $badges->badge_name }}
                                    </label>

                                    <input type="hidden" 
                                           name="badge_image[{{ $badges->badge_name }}]" 
                                           value="{{ $badges->badge_image }}">
                                </div>
                                @endforeach
                            </div>

                            <div class="col-lg-4">
                                <label class="form-label">Task Levels</label>
                                <small class="form-text text-muted"><i>Select Level appropriate for Task</i></small>

                                @foreach($level as $index => $levels)
                                <div class="form-check">
                                    <input type="radio" 
                                           id="level_{{ $levels->id }}" 
                                           name="level_id" 
                                           value="{{ $levels->id }}" 
                                           class="form-check-input"
                                           @if($index == 0) checked @endif>

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
                                    <option value="Weekly">Weekly</option>
                                    <option value="Monthly">Monthly</option>
                                    <option value="Yearly">Yearly</option>
                                </select>
                            </div>
                        </div>

                </div>
            </div>

            <!-- Instructions & Images -->
            <div class="card">
                <div class="card-header">
                    <h5>Task submission Instruction</h5>
                </div>

                <div class="card-body">
                    <div class="row">

                        <!-- Instructions -->
                        <div class="col-lg-6">
                            <div class="mb-3">
                                <label class="form-label">Submission Instruction</label>
                                <textarea class="form-control" name="submission_instruction" rows="5" style="white-space: pre-wrap;">{{ old('submission_instruction')}}</textarea>
                            </div>
                        </div>

                        <!-- File Upload -->
                      <div class="col-lg-6">
    <div class="mb-3">
        <label class="form-label">Task Images</label>

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
                                    Create Task
                                    <!-- ORIGINAL SUBMIT ICON -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-external-link"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
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


<!-- JS to add more file inputs -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const fileInputsWrapper = document.getElementById('fileInputs');
    const addButton = document.getElementById('addImages');

    addButton.addEventListener('click', function () {
        let newRow = document.createElement('div');
        newRow.classList.add('input-group', 'search-form', 'mb-2');

        newRow.innerHTML = `
            <input type="file" name="files[]" class="form-control">
            <span class="input-group-text bg-danger text-white removeImage" style="cursor:pointer;">X</span>
        `;

        fileInputsWrapper.appendChild(newRow);

        // Remove button handler
        newRow.querySelector('.removeImage').addEventListener('click', function () {
            newRow.remove();
        });
    });
});

</script>



@endsection
