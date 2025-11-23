@extends('admin.admin_dashboard')
@section('admin')

<div class="container" style="padding-top:80px;">
	<div class="row">
        <div class="col-lg-12">

            <!-- Create Task Card -->
            <div class="card">
                <div class="card-header">
                    <h5>Create Topics</h5>
                </div>

                <div class="card-body">
                	<a href="{{ route('topics.create') }}" class="btn btn-primary mb-3">Create Topic</a>

                    	<form method="POST" action="{{ route('topics.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label>Topic Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>

                        <button class="btn btn-success">Save Topic</button>
                    </form>
                </div>
            </div>

         </div>
     </div>       
</div>
   

   @endsection