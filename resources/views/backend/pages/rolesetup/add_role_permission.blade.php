@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<style>
    .form-check{
        text-transform:capitalize;
    }
</style>

<div class="page-content">


        
        <div class="row profile-body">
       
          <!-- middle wrapper start -->
          <div class="col-md-11 col-xl-11 middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">
             
								<h6 class="card-title">Add Roles in Permission</h6>
                                <hr />

								<form id="myForm" method="POST" action="{{route('role.permission.store')}}" class="forms-sample">
                                    @csrf
                                   
                                    	
                                            <div class="mb-3">
										
										<label for="forGroupName" class="form-label">Role Name</label>
										<select  name="role_id" class="form-select" id="forGroupName">

                                        <option selected="" disabled="">Select  Group</option>
                                        @foreach($roles as $role)
                                        <option  value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                   
                                    </div>
										
                                    <div class="form-check mb-2">
                      <input type="checkbox" class="form-check-input" id="checkDefaultmain">
											<label class="form-check-label" for="checkDefaultmain">
												All Permissions
											</label>
										</div>
<hr />
@foreach($permission_groups as $group)
<!-- Row started -->
<div class="row ">
    <div class="col-3 ">
    <div class="form-check mb-2">
                      <input type="checkbox" class="form-check-input" id="checkDefault">
											<label class="form-check-label" for="checkDefault">
												{{$group->group_name}}
											</label>
										</div>
    </div>

    <div class="col-9 ">

    @php
    $permissions = App\Models\User::getpermissionByGroupName($group->group_name);

    @endphp
    @foreach($permissions as $permission)
    <div class="form-check mb-2">
    <input type="checkbox" name="permission[]" class="form-check-input" id="checkDefault{{ $permission->id}}" value="{{ $permission->id}}">
	<label class="form-check-label" for="checkDefault{{ $permission->id}}">
						{{ $permission->name}}
						</label>
										</div>
        @endforeach
        <br />

    </div>
  
</div>
 @endforeach
	<!-- Row Ended	 -->
                                 
									<button type="submit" class="btn btn-primary me-2">Save Changes</button>
								
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
                role_id: {
                    required : true,
                }, 
                
                
            },
            messages :{
                role_id: {
                    required : 'Please Select Role Name',
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

<script>
$('#checkDefaultmain').click(function(){
    if ($(this).is(':checked')){
        $('input[type= checkbox]').prop('checked', true);

    }else{
        $('input[type= checkbox]').prop('checked', false);
    }
});
</script>

@endsection