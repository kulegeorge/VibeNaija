@extends('admin.admin_dashboard')
@section('admin')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<div class="container" style="padding-top:80px;">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header">
                    <h5>Tasks List</h5>
                    <a href="{{ route('admin.Tasks') }}" class="btn btn-success float-end">Add New Task</a>
                </div>

                <div class="card-body">
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
                                                <img src="{{ asset('uploads/tasks/'.$img) }}" width="50" height="50" style="object-fit:cover;">
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('task.show', $task->id) }}" class="btn btn-outline-primary btn-sm" data-id="{{ $task->id }}">view</a><a href="{{ route('admin.edit-task', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                        <button class="btn btn-danger btn-sm delete-task" data-id="{{ $task->id }}">Delete</button>
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
