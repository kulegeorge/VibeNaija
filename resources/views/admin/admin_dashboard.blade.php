<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="VibeNaija is an online cultural immersion platform designed to help Nigerian teenagers and young adults in the diaspora and at home, reconnect with their roots through interactive social and cultural challenges.
The platform will combine learning, fun, and community through weekly or monthly cultural tasks that promote Nigerian traditions, language, history, music, and lifestyle — all presented in a gamified way (points, badges, and levels).
The long-term vision is to create a global online community of young Nigerians who celebrate and share their heritage proudly.">
	<meta name="author" content="VibeNaija">
	<meta name="keywords" content="VibeNaija">

	<title>Control Panel</title>
	  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- core:css -->
	  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script> -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/fullcalendar/main.min.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
	<!-- End plugin css for this page -->


	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('Backend/assets/css/demo1/style.css') }}">
  <!-- End layout styles -->
  
  <link rel="shortcut icon" href="{{ asset('Backend/assets/images/favicon.png') }}" />

  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
 



     
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

		@yield('admin')

    @include('admin.body.footer')

    
		</div>
	</div>
	
	<!-- core:js -->
	<script src="{{ asset('Backend/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('Backend/assets/js/code/code.js') }}"></script>
	<script src="{{ asset('Backend/assets/js/code/validate.min.js') }}"></script>
	<!-- Plugin js for this page -->
  <script src="{{ asset('Backend/assets/vendors/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for this page -->
	<!-- Plugin js for this page -->
	<script src="{{ asset('Backend/assets/vendors/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('Backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('Backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('Backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->
  <script src="{{ asset('Backend/assets/js/dashboard-dark.js') }}"></script>
	<!-- End custom js for this page -->

	<!-- Plugin js for this page -->
<script src="{{ asset('Backend/assets/vendors/moment/moment.min.js') }}"></script>
<script src="{{ asset('Backend/assets/vendors/fullcalendar/main.min.js') }}"></script>

	<!-- endinject -->




	<!-- End custom js for this page -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


	<!-- Custom js for this page -->
  <script src="{{ asset('Backend/assets/js/data-table.js') }}"></script>
	<!-- End custom js for this page -->
	<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

<!-- Laravel Echo + Pusher -->
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>

<script>
    Echo.private('notifications.{{ Auth::id() }}')
        .listen('NewNotificationEvent', (e) => {
            console.log('Notification received:', e);

            // OPTIONAL: Update your notification bell dropdown
            let count = document.getElementById('notif-count');
            if (count) count.textContent = parseInt(count.textContent) + 1;

            // Optional: append to dropdown
            let list = document.getElementById('notif-list');
            if (list) {
                list.innerHTML =
                    `<li class="dropdown-item">${e.title}</li>` + list.innerHTML;
            }
        });
</script>
</body>
</html>    