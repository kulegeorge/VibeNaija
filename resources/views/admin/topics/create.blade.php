@section('title', 'Vibe Nigeria- Create New Topics')
@extends('admin.admin_dashboard_new')
@section('admin2')

<!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
	<div class="row">
        <div class="col-lg-12">

            <!-- Create Task Card -->
            <div class="card">
                <div class="card-header card-bg">
                    <h5>Create Topics</h5>
                </div>

                <div class="card-body">
                	<a href="{{ route('topics.create') }}" class="btn btn-primary mb-3">Create New Topic</a>

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

                        <button class="btn btn-outline-secondary block">Save Topic</button>
                    </form>
                </div>
            </div>

         </div>
     </div>       
</div>
   

   @endsection