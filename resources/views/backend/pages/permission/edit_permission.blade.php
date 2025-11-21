@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">

        
        <div class="row profile-body">
       
          <!-- middle wrapper start -->
          <div class="col-md-7 col-xl-7 middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">
             
								<h6 class="card-title">Add Permissions</h6>
<hr />
								<form id="myForm" method="POST" action="{{route('update.permission')}}" class="forms-sample">
                                    @csrf
                                   
                                    	<input type="hidden" name="id" value="{{$permission->id}}" />
                                            <div class="form-group mb-3">
										<label for="permissionName" class="form-label">Permission Name</label>
										<input type="text"  name="name" class="form-control" id="permissionName" value="{{ $permission->name}}">
                                        
                                    </div>
											
                                    <div class="form-group mb-3">
										<label for="forGroupName" class="form-label">Group Name</label>
										<select  name="group_name" class="form-select" id="forGroupName">

                                        
                                        <option  value="poh profile" {{ $permission->group_name == 'poh profile' ? 'selected': ''}}>POH Profile</option>
                                        <option  value="site settings" {{ $permission->group_name == 'site settings' ? 'selected': ''}}>Site Settings</option>
                                     
                                  
                                        <option  value="role_management" {{ $permission->group_name == 'role_management' ? 'selected': ''}}>Role Management</option>
                                        <option  value="admin_management" {{ $permission->group_name == 'admin_management' ? 'selected': ''}}>administrator Management</option>
                                    
                                    </select>
                                    </div>

									
                                 
									<button type="submit" class="btn btn-success me-2">Update Permission</button>
								
								</form>

              </div>
            </div>
             
            </div>
          </div>
          <!-- middle wrapper end -->
         
        </div>

			</div>
            <script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                group_name:{
                    required:true,
                },
                
            },
            messages :{
                name: {
                    required : 'Please Enter Permission Name',
                }, 
                group_name: {
                    required : 'Please Enter Permission Group Name',
                }, 

            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection