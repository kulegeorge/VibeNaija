@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
@if(Auth::user()->can('add.adminstrators'))
<nav class="page-breadcrumb">
    <ol class="breadcrumb">
        <li class="btn btn-inverse-info"><a href="{{ route('add.admin') }}">Add Admin</a></li>
        
    </ol>
</nav>
@endif
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
<div class="card">
<div class="card-body">
<h6 class="card-title">All Admin</h6>
<hr />
 <div class="table-responsive">
  <table id="dataTableExample" class="table">
    <thead>
      <tr>
        <th>S/N</th>
        <th>Image</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Role</th>
        <th>Action</th>
      
      </tr>
    </thead>
    <tbody>
        @foreach($allAdmin as $key=> $admin)
      <tr>
        <td>{{ $key+1 }}</td>
        <td><img class="wd-80 rounded-circle" src="{{ (!empty($admin->photo)) ? url('upload/admin_images/'.$admin->photo) : url('upload/no_image.jpg'); }}" alt="profile"></td>
        <td>{{ $admin->title }} {{ $admin->name }}</td>
        <td>{{ $admin->email }}</td>
        <td>{{ $admin->phone }}</td>
        <td>
        @foreach($admin->roles as $role)
       <span class="badge badge-pill bg-danger"> {{ $role->name }}</span>
        @endforeach
        </td>
      
        <td>
        @if(Auth::user()->can('edit.adminstrators'))
        <a href="{{ route('edit.admin', $admin->id) }}" class="btn btn-inverse-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>Edit</a>
        @endif
        @if(Auth::user()->can('delete.adminstrators'))
        <a href="{{ route('delete.admin', $admin->id) }}" id="delete" class="btn btn-inverse-danger"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>Delete</a>
        @endif
      
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

@endsection