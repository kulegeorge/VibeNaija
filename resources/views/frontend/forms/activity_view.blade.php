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
  <link rel="stylesheet" href="{{ asset('Backend//assets/vendors/owl.carousel/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('Backend//assets/vendors/owl.carousel/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('Backend//assets/vendors/animate.css/animate.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('Backend/assets/css/demo1/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('Backend/assets/images/favicon.png') }}" />
  <!-- core:css -->

	<!-- endinject -->

	


</head>
<body>
	<style type="text/css">
.img-item {
    float: left;
    width:  100px;
    height: 100px;
    object-fit: cover;
}
	</style>
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
						<li class="breadcrumb-item"><a href="#">Form</a></li>
						<li class="breadcrumb-item active" aria-current="page">Activity View</li>
					</ol>
				</nav>

				<div class="row">
					<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h4 class="card-title">{{ $event->title}} <span class="text-muted">{{ $event->start}} -{{ $event->end}} </span> 
									<a class="btn btn-primary btn-icon-text btn-xs"  href="/event-record/update/{{ $event->id}}/?edit_mode=true">

									<i class="btn-icon-prepend" data-feather="check-square"></i>Add Activities</a>

									<a class="btn btn-danger btn-icon-text btn-xs" href="/expense-record/update/{{ $event->id}}/?edit_mode=true"> 
										<i class="btn-icon-append" data-feather="box"></i> Manage Expenses</a>
									</h4>

                <p class="text-muted">Uploaded activities and programes of COSROPIN</p>
							</div>
						</div>
          </div>
        </div>
        
        <div class="row">
         			<div class="col-md-12 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								
					  <div id="wizard">
					  	<div id='external-events' class='external-events'>
                                     
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Activity Description</div>
                      </div>
                     </div> 
                  
                 

                 
                  
                           <div class="card">
						    <div class="card-body">
						      @if(!empty($activity))
						     <textarea class="form-control" name="description" id="description" rows="5">{{$activity->description}}</textarea>
						    @endif
						    </div>
						    
						  </div>
						    
  
                 
  
                 
                </div>
							</div>
						</div>
						
					</div>







          <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div id='external-events' class='external-events'>
                                     
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Activity Images</div>
                      </div>
                     </div> 
                	@if(count($arr) > 0)
                <div class="owl-carousel owl-theme owl-basic owl-loaded owl-drag">
                
                	@foreach($arr as $item)
                		<div class="item">
                    <img class="img-item" src="{{asset('pictures/activity_pictures/'.$item)}}" alt="item-image">
                  </div>
                  
                	@endforeach
                
                  
                </div>
                	@endif
              </div>
            </div>
          </div>
      
         <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
               <div id='external-events' class='external-events'>
                                     
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Uploaded Documents</div>
                      </div>
                     </div> 
                     @if(count($arrDoc) > 0)
                <div class="d-flex gap-3 flex-wrap" id="grid-example">
                	@foreach($arrDoc as $itemDoc)
              
                  <div class="item">
                    <img src="{{asset('upload/ic.png')}}"  width="110px" />
                   <p style="width: 100px;"><a href="{{asset('documents/'.$itemDoc)}}"> <i>{{$itemDoc}}</i></a></p>
                  </div>
                 
                  	
                 
                  @endforeach
                  
                 
                </div>
                @endif
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div id='external-events' class='external-events'>
                                     
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Activity Videos</div>
                      </div>
                     </div> 
                         @if(count($arrvid) > 0)
              <div class="owl-carousel owl-theme owl-basic owl-loaded owl-drag">
                  
                 @foreach($arrvid as $itemvid)
                 {{$itemvid}}
                  <!-- <div class="item">
                    <img src="http://via.placeholder.com/265x167" alt="item-image">
                  </div> -->
                @endforeach
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>

			</div>

	<!-- core:js -->
	<script src="{{ asset('Backend/assets/vendors/core/core.js') }}"></script>
	
	<!-- endinject -->
<!-- Plugin js for this page -->
  <script src="{{ asset('Backend/assets/vendors/owl.carousel/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendors/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
	<!-- End plugin js for this page -->




	<!-- inject:js -->
	<script src="{{ asset('Backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('Backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('Backend/assets/js/carousel.js') }}"></script>
 

	<!-- End custom js for this page -->





</body>
</html>