@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">

        
        <div class="row profile-body">
       
          <!-- middle wrapper start -->
          <div class="col-md-11 col-xl-11 middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">
             
								<h6 class="card-title">Add Roles</h6>
                                <hr />

								<form id="myForm" method="POST" action="{{route('store.roles')}}" class="forms-sample">
                                    @csrf
                                   
                                    	
                                            <div class="mb-3">
										<label for="permissionName" class="form-label">Role Name</label>
										<input type="text"  name="name" class="form-control" id="permissionName">
                                      
                                    </div>
											
                                    
                                   

									
                                 
									<button type="submit" class="btn btn-primary me-2">Add Role</button>
								
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
                
                
            },
            messages :{
                name: {
                    required : 'Please Enter Role Name',
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