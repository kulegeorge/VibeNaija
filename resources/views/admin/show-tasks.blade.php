@extends('admin.admin_dashboard')
@section('admin')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<style>
    /* Prevent cell content from overlapping */
    #tasksTable img {
        margin: 2px;
        border-radius: 4px;
    }

    #tasksTable td, #tasksTable th {
        vertical-align: middle;
        white-space: nowrap; 
    }

    .action-buttons a,
    .action-buttons button {
        margin-right: 5px;
        margin-bottom: 4px;
    }
</style>

<div class="container" style="padding-top:80px;">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5>Tasks List</h5>
                    <a href="{{ route('admin.Tasks') }}" class="btn btn-success">Add New Task</a>
                </div>

                <div class="card-body">
                    <div class="table-responsive"> 
                        <table id="tasksTable" class="display table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Points</th>
                                    <th>Badge</th>
                                    <th>Level</th>
                                    <th>Duration</th>
                                    <th>Images</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->taskname }}</td>
                                    <td>{{ $task->category }}</td>
                                    <td>{{ $task->task_points }}</td>
                                    <td>{{ $task->badge_name }}</td>
                                    <td>{{ $task->task_level }}</td>
                                    <td>{{ $task->duration }}</td>

                                    <td>
                                        @if($task->images)
                                            @foreach(json_decode($task->images) as $img)
                                                <img src="{{ asset('uploads/tasks/'.$img) }}" 
                                                     width="50" height="50" 
                                                     style="object-fit:cover;">
                                            @endforeach
                                        @endif
                                    </td>

                                    <td class="action-buttons">
                                        <a href="{{ route('task.show', $task->id) }}" 
                                           class="btn btn-outline-primary btn-sm">View</a>

                                        <a href="{{ route('admin.edit-task', $task->id) }}" 
                                           class="btn btn-warning btn-sm">Edit</a>

                                        <button class="btn btn-danger btn-sm delete-task" 
                                                data-id="{{ $task->id }}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready(function() {
    $('#tasksTable').DataTable();

    // Delete task
    $('.delete-task').click(function(){
        let taskId = $(this).data('id');
        if(confirm('Are you sure you want to delete this task?')){
            $.ajax({
                url: '/admin/tasks/' + taskId,
                type: 'DELETE',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(response){
                    alert(response.success);
                    location.reload();
                },
                error: function(err){
                    alert('Error deleting task');
                }
            });
        }
    });
});
</script>

@endsection
