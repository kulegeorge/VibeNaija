@section('title', 'Vibe Nigeria- User Profile page')
@extends('admin.admin_dashboard_new')
@section('admin2')


 
    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-content">

        
        <div class="row profile-body">
          <!-- left wrapper start -->
          <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
            <div class="card rounded">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-2">
                 
                  <div>
                   <img class="wd-70 rounded-circle" id="showImage" src="{{ (!empty($profileData->photo)) ? url('upload/'.$profileData->photo) : url('upload/no_image.jpg'); }}" alt="profile" style="width: 70px; height:70px;">
                    <span class="h4 ms-3 text-dark">{{ $profileData->title}} {{ $profileData->name}}</span>
                  </div>
                 
                </div>
               
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Address:</label>
                  <p class="text-muted">{{ $profileData->address}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Email:</label>
                  <p class="text-muted">{{ $profileData->email}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
                  <p class="text-muted">{{ $profileData->phone}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Location:</label>
                  <p class="text-muted">{{ $profileData->location}}</p>
                </div>
                <div class="mt-3">
                  <label class="tx-11 fw-bolder mb-0 text-uppercase">Role:</label>
                  <p class="text-muted">{{ $profileData->role}}</p>
                </div>
                <div class="mt-3 d-flex social-links">
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="github"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="twitter"></i>
                  </a>
                  <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                    <i data-feather="instagram"></i>
                  </a>status
                </div>
               
              </div>
            </div>
          </div>
          <!-- left wrapper end -->
          <!-- middle wrapper start -->
          <div class="col-md-7 col-xl-7 middle-wrapper">
            <div class="row">
            <div class="card">
              <div class="card-body">
             
								<h6 class="card-title">Update Profile</h6>

								<form method="POST" action="{{route('user.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
											<div class="col-sm-3">
                                            <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Title</label>
                                        <select name="title" id="exampleInputUsername1" class="form-control">
              <option value="MR">Mr.</option>
<option value="MRS">Mrs.</option>
<option value="ALH">Alh.</option>
<option value="BARR">Barr.</option>
<option value="BRO">Bro.</option>
<option value="BSHP">Bshp.</option>
<option value="CHF">Chf.</option>
<option value="CPT">Cpt.</option>
<option value="DR">Dr.</option>
<option value="GOV">Gov.</option>
<option value="HON">Hon</option>
<option value="HRH">Hrh.</option>
<option value="MISS">Miss.</option>
<option value="MS">Ms.</option>
<option value="MSTR">Mstr.</option>
<option value="PRES">Pres.</option>
<option value="PROF">Prof</option>
<option value="REV">Rev.</option>
<option value="SEN">Sen.</option>
<option value="SIR">Sir.</option>
<option value="SIS">Sis.</option>
</select>	</div>

											</div><!-- Col -->
											<div class="col-sm-9">
                                            <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Name</label>
										<input type="text" name="name" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->name}}">
									</div>
											</div><!-- Col -->
										</div>
                                    
                                       

                                        <div class="row">
											<div class="col-sm-12">
                                            <div class="mb-3">
										<label for="exampleInputUsername1" class="form-label">Address</label>
										<input type="text" name="address" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->address}}">
									</div>
											</div><!-- Col -->
										
										</div>

                     <div class="row">
                    
                      <div class="col-sm-12">
                                            <div class="mb-3">
                    <label for="exampleInputUsername1" class="form-label">Phone Number</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputUsername1" autocomplete="off" value="{{$profileData->phone}}">
                  </div>
                      </div><!-- Col -->
                    </div>

									<div class="mb-3">
										<label for="exampleInputPassword1" class="form-label">Photo</label>
										<input type="file" name="photo" class="form-control" id="image">
									</div>
                                    <div class="mb-3">
										
                                    <img class="wd-70 rounded-circle" id="showImage" src="{{ (!empty($profileData->photo)) ? url('upload/'.$profileData->photo) : url('upload/no_image.jpg'); }}" alt="profile" style="width: 70px; height:70px;">
                
									</div>
									
									<button type="submit" class="btn btn-primary me-2">Save Changes</button>
								
								</form>

              </div>
            </div>
             
            </div>
          </div>
          <!-- middle wrapper end -->
         
        </div>

			</div>
<script>
    $(document).ready( function() {
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

 
</script>

@endsection