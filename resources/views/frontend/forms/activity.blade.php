<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Activity Records</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('Backend/assets/vendors/jquery-steps/jquery.steps.css') }}">

	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/dropify/dist/dropify.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('Backend/assets/css/demo1/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('Backend/assets/images/favicon.png') }}" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
 

    <script src="{{ asset('Backend/assets/js/sweet.js')}}"></script>


</head>
<body>
	<div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
    
        @include('admin.body.sidebar')
        <!-- partial -->
    
        <div class="page-wrapper">
                    
            <!-- partial:partials/_navbar.html -->
        @include('admin.body.header')
            <!-- partial -->
			<div class="page-content">

				<nav class="page-breadcrumb">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="#">Forms</a></li>
						<li class="breadcrumb-item active" aria-current="page">Event Records/{{ $event->title}}</li>
					</ol>
        </nav>
        <form name="document" method="POST" action="{{ route('event.save')}}" enctype="multipart/form-data">
        	@csrf
        <div class="row">
        	<input type="hidden" name="id" value="{{ $event->id}}">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">{{ $event->title}} <span class="badge border border-info text-info"><a href="/event-record/{{ $event->id}}/?edit_mode=true"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-corner-up-left"><polyline points="9 14 4 9 9 4"></polyline><path d="M20 20v-7a4 4 0 0 0-4-4H4"></path></svg> Return to View</a></span> <span class="badge border border-info text-info"><a href="/event-record/update/{{ $event->id}}/?edit_mode=true">Editing <img src="{{asset('upload/ajaxloader.gif')}}" width="20px" /></a></span></h4>
					  <div id="wizard">
                  <h2>Activity Description</h2>
                   @if(session('status'))
                  <script> swal("Good job!", "{{session('status')}}", "success"); </script>

                   @endif
                    @if(session('error'))
                  <script> swal("Sorry!", "{{session('error')}}", "error"); </script>

                   @endif

                  <section>
                  
                                    		<div class="card">
						    <div class="card-body">
						      <h4>Enter Description</h4>
						       <textarea class="form-control" name="description" id="description" rows="5">@if(!empty($activity)){{$activity->description}}@endif</textarea>
						    </div>
						    
						  </div>
						                    

						 
                 
                  </section>
  
                  <h2>Documentation (pdf/docs/xln/ppt)</h2>
                   <section>
                  	
                  		<div class="card">
						    <div class="card-body">
						      <h4>Documentation Files</h4>
						    
						      <p class="text-muted mb-3">Upload all your documents here</p>
								<input type="file" name="document" id="myDropify"/>
							  </div>
						    </div>

                  </section>
  
                 <h2>Images </h2>
                  <section>
                  	
                  		<div class="card">
						    <div class="card-body">
						      <h4>Pictures Upload</h4>
						     
						      <p class="text-muted mb-3">Upload Event Pictures here</p>
								<input type="file" name="pictures" id="imgDropify"/>
							  </div>
						    </div>


						    
                  </section>
  
                  <h2>Videos clips</h2>
                  <section>
                  	
                  		<div class="card">
						    <div class="card-body">
						      <h4>Videos Upload</h4>
						     
						      <p class="text-muted mb-3">Upload Video Clip here</p>
								<input type="file" name="videos" id="videoDropify"/>
							  </div>
						    </div>


						    
                  </section>
                 
                </div>
							</div>
						</div>
						
					</div>
					<button type="submit" class="btn btn-icon-text btn-linkedin">
							<i class="btn-icon-prepend" data-feather="check-square"></i>
													Upload & Continue
							</button>

						
        </div>
        
  
						      
						                    

						 
                    </form>
	</div>

	<!-- core:js -->
	<script src="{{ asset('Backend/assets/vendors/core/core.js') }}"></script>
		 <script src="{{ asset('Backend/assets/vendors/dropify/dist/dropify.min.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
  <script src="{{ asset('Backend/assets/vendors/jquery-steps/jquery.steps.min.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('Backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('Backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('Backend/assets/js/wizard.js') }}"></script>
	<!-- End custom js for this page -->

<script>
   
    $(function() {
  'use strict';

  $('#myDropify').dropify();
  $('#videoDropify').dropify();
  $('#imgDropify').dropify();

});
</script>

<script src="jquery.js"></script>




</body>
</html>