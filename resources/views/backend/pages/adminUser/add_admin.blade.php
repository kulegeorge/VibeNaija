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
             
								<h6 class="card-title">Add Administrator</h6>
                                <hr />

								<form id="myForm" method="POST" action="{{route('store.admin')}}" class="forms-sample">
                                    @csrf
                                   
                                    <div class="row">
                                    <div class="col-sm-6">
                                       <div class="mb-3">
										<label for="titleField" class="form-label">Title</label>
                                        <select name="title" id="titleField" class="form-control">
              <option value="MR">Mr.</option>
<option value="Mrs">Mrs.</option>
<option value="Alh">Alh.</option>
<option value="Barr">Barr.</option>
<option value="Bro">Bro.</option>
<option value="Bshp">Bshp.</option>
<option value="Chf">Chf.</option>
<option value="Cpt">Cpt.</option>
<option value="Dr">Dr.</option>
<option value="Gov">Gov.</option>
<option value="Hon">Hon</option>
<option value="Hrh">Hrh.</option>
<option value="Miss">Miss.</option>
<option value="Ms">Ms.</option>
<option value="Pres">Pres.</option>
<option value="Prof">Prof</option>
<option value="Rev">Rev.</option>
<option value="Sen">Sen.</option>
<option value="Sir">Sir.</option>
<option value="Sis">Sis.</option>
</select>	</div>

</div>

											<div class="col-sm-6">
                                       <div class="mb-3">
										<label for="adminName" class="form-label">Admin Name<span class="text-danger">*</span></label>
										<input type="text"  name="name" class="form-control" id="adminName">
                                      
                                    </div>
</div>
<div class="col-sm-6">

                                    <div class="mb-3">
										<label for="email" class="form-label">Admin Email<span class="text-danger">*</span></label>
										<input type="email"  name="email" class="form-control" id="email">
                                      
                                    </div>
                            </div>
<div class="col-sm-6">

                                    <div class="mb-3">
										<label for="phone" class="form-label">Admin Phone Number</label>
										<input type="text"  name="phone" class="form-control" id="phone">
                                      
                                    </div>
                                    </div>
<div class="col-sm-6">
                                    <div class="mb-3">
										<label for="address" class="form-label">Admin Address<span class="text-danger">*</span></label>
										<input type="text"  name="address" class="form-control" id="address">
                                      
                                    </div>
                                    </div>
<div class="col-sm-6">
                                    <div class="mb-3">
										<label for="location" class="form-label">Location</label>
										<select name="location" id="location" class="form-control">
                                        <option selected="" disabled="">Select  Location</option>
          <option value="Abia">Abia</option>
          <option value="Abuja">Abuja</option>
          <option value="Adamawa">Adamawa</option>
          <option value="AkwaIbom">AkwaIbom</option>
          <option value="Anambra">Anambra</option>
          <option value="Bauchi">Bauchi</option>
          <option value="Bayelsa">Bayelsa</option>
          <option value="Benue">Benue</option>
          <option value="Borno">Borno</option>
          <option value="CrossRiver">CrossRiver</option>
          <option value="Delta">Delta</option>
          <option value="Ebonyi">Ebonyi</option>
          <option value="Edo">Edo</option>
          <option value="Ekiti">Ekiti</option>
          <option value="Enugu">Enugu</option>
          <option value="Gombe">Gombe</option>
          <option value="Imo">Imo</option>
          <option value="Jigawa">Jigawa</option>
          <option value="Kaduna">Kaduna</option>
          <option value="Kano">Kano</option>
          <option value="Katsina">Katsina</option>
          <option value="Kebbi">Kebbi</option>
          <option value="Kogi">Kogi</option>
          <option value="Kwara">Kwara</option>
          <option value="Lagos_more">Lagos</option>
          <option value="Nasarawa">Nasarawa</option>
          <option value="Niger">Niger</option>
          <option value="Ogun">Ogun</option>
          <option value="Ondo">Ondo</option>
          <option value="Osun">Osun</option>
          <option value="Oyo">Oyo</option>
          <option value="Plateau">Plateau</option>
          <option value="Rivers">Rivers</option>
          <option value="Sokoto">Sokoto</option>
          <option value="Taraba">Taraba</option>
          <option value="Yobe">Yobe</option>
          <option value="Zamfara">Zamfara</option>
          
                </select>
                                    </div>
                                    </div>
<div class="col-sm-6">
                                   
                                    <div class="mb-3">
										<label for="password" class="form-label">Admin Password<span class="text-danger">*</span></label>
										<input type="password"  name="password" class="form-control" id="password">
                                      
                                    </div>

                                    </div>
<div class="col-sm-6">
                                    <div class="mb-3">
										<label for="permissionName" class="form-label">Assign Role <span class="text-danger">*</span></label>
										<select  name="roles" class="form-select" id="forGroupName">

                                        <option selected="" disabled="">Select  Role</option>
                                        @foreach($roles as $role)
                                      
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>

									</div>
</div>
                                 
									<button type="submit" class="btn btn-primary me-2">Add Admin</button>
								
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
                email: {
                    required : true,
                },  
                address: {
                    required : true,
                }, 
                password: {
                    required : true,
                }, 
                
            },
            messages :{
                name: {
                    required : 'Please Enter Admin Name',
                }, 
                email: {
                    required : 'Please Enter A valid Email Address',
                }, 
                address: {
                    required : 'Please Enter Address',
                }, 
                password: {
                    required : 'Please Enter A Password',
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