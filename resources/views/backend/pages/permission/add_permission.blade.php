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

								<form id="myForm" method="POST" action="{{route('store.permission')}}" class="forms-sample" enctype="multipart/form-data">
                                    @csrf
                                   
                                    	
                                            <div class="mb-3">
										<label for="permissionName" class="form-label">Permission Name</label>
										<input type="text"  name="name" class="form-control" id="permissionName">
                                      
                                    </div>
											
                                    <div class="mb-3">
										<label for="forGroupName" class="form-label">Group Name</label>
										<select  name="group_name" class="form-select" id="forGroupName">

                                        <option selected="" disabled="">Select  Group</option>
                                        <option  value="poh profile">POH Profile</option>
                                        <option  value="site settings">Site Settings</option>
                                        <option  value="role_management">Role Management</option>
                                        <option  value="admin_management">administrator Management</option>
                                    </select>
                                    </div>

									
                                 
									<button type="submit" class="btn btn-primary me-2">Add Permission</button>
								
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