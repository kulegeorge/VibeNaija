<!DOCTYPE html>
<html>
<head>
    <title>How to Use Fullcalendar in Laravel 8</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />
     <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

  	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/core/core.css') }}">
		<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
	<!-- End plugin css for this page -->
	<!-- endinject -->
	<!-- Plugin css for this page -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/flatpickr/flatpickr.min.css') }}">
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->
  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('Backend/assets/css/demo2/style.css') }}">
  <!-- End layout styles -->
  
  <link rel="shortcut icon" href="{{ asset('Backend/assets/images/favicon.png') }}" />

 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
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

    
  <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3 d-none d-md-block">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title mb-4">Full calendar</h6>
                    <div id='external-events' class='external-events'>
                      <h6 class="mb-2 text-muted">Draggable Events</h6>
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Birth Day</div>
                      </div>
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>New Project</div>
                      </div>
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Anniversary</div>
                      </div>
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Clent Meeting</div>
                      </div>
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Office Trip</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-9">
                <div class="card">
                  <div class="card-body">
                    <div id='calendar'></div>
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

         <div id="createEventModal" class="modal fade">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-header">
                <h4 id="modalTitle2" class="modal-title">Create New Event</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><span class="visually-hidden">close</span></button>
              </div>
              <div id="modalBody2" class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" id="title">
                  </div>
                  
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button  id="saveBtn" class="btn btn-primary">Save Event</button>
              </div>
            </div>
          </div>
        
         
        </div> <!-- row -->


</div>

    @include('admin.body.footer')

    
		</div>
	</div>
	

</div>
   
<script>

$(document).ready(function () {

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        editable:true,
        header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
        },
        events:'/event',
        selectable:true,
        selectHelper: true,
        select:function(start, end, allDay)
        {
           $("#createEventModal").modal('show');

			      $('#saveBtn').click(function(){
			      	var title = $('#title').val();
			        
			                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

			                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

			                $.ajax({
			                    url:"/full-calender/action",
			                    type:"POST",
			                    data:{
			                        title: title,
			                        start: start,
			                        end: end,
			                        type: 'add'
			                    },
			                    success:function(data)
			                    {
			                    	console.log(data);
			                        calendar.fullCalendar('refetchEvents');
			                        alert("Event Created Successfully");
			                    }
			                })
			            
			      	console.log(start_date);
			      });

        },
        editable:true,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated Successfully");
                }
            })
        },
        eventDrop: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                    title: title,
                    start: start,
                    end: end,
                    id: id,
                    type: 'update'
                },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated Successfully");
                }
            })
        },

        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        id:id,
                        type:"delete"
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Deleted Successfully");
                    }
                })
            }
        }
    });

});
  
</script>


	
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="{{ asset('Backend/assets/js/code/code.js') }}"></script>
	<script src="{{ asset('Backend/assets/js/code/validate.min.js') }}"></script>
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





	<!-- End custom js for this page -->
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


	<!-- Custom js for this page -->
  <script src="{{ asset('Backend/assets/js/data-table.js') }}"></script>
	<!-- End custom js for this page -->
  
</body>
</html>
