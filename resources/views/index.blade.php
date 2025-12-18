<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="">
    <meta name="author" content="NobleUI">
    <meta name="keywords" content="LIMS">

    <title>Administrator Panel</title>
      <meta name="csrf-token" content="{{ csrf_token() }}" />

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('Backend/assets/vendors/core/core.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('Backend/assets/vendors/sweetalert2/sweetalert2.min.css') }}"> -->
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

  <!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" > -->
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

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
          <div>
            <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
          </div>
          <div class="d-flex align-items-center flex-wrap text-nowrap">
            <div class="input-group flatpickr wd-200 me-2 mb-2 mb-md-0" id="dashboardDate">
              <span class="input-group-text input-group-addon bg-transparent border-primary" data-toggle><i data-feather="calendar" class="text-primary"></i></span>
              <input type="text" class="form-control bg-transparent border-primary" placeholder="Select date" data-input>
            </div>
            <button type="button" class="btn btn-outline-primary btn-icon-text me-2 mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="printer"></i>
              Print
            </button>
            <button type="button" class="btn btn-primary btn-icon-text mb-2 mb-md-0">
              <i class="btn-icon-prepend" data-feather="download-cloud"></i>
              Download Report
            </button>
          </div>
        </div>


       

       <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-3 d-none d-md-block">
                <div class="card">
                  <div class="card-body">
                    <h6 class="card-title mb-4">Full calendar</h6>
                    <div id='external-events' class='external-events'>
                    
                      
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Activities</div>
                      </div>
                      <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Expenses</div>
                      </div>
                     <!--  <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Clent Meeting</div>
                      </div> -->
                     <!--  <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                        <div class='fc-event-main'>Office Trip</div>
                      </div> -->
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-9">
                <div class="card">
                  <div class="card-body">
                    <div id='fullcalendar'></div>
                  </div>
                  </div>
              </div>
            </div>
          </div>
        </div>

        <div id="fullCalModal" class="modal fade" style="border-radius: 0;">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:0;">
              <div class="modal-header">
                <h4 id="modalTitle1" class="modal-title"></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><span class="visually-hidden">close</span></button>
              </div>
              <div id="modalBody1" class="modal-body">
                
              </div>
              <div class="modal-footer">
          
                <a href=""  class="btn btn-icon-text btn-linkedin" id="viewEvent" style="border-radius:0;"> 
                 <i class="btn-icon-prepend" data-feather="check-square"></i>  View more</a>

                <button class="btn btn-icon-text btn-danger" id="removeEvent" style="border-radius:0;">

                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete Event

                </button>
              </div>
            </div>
          </div>
        </div>


 <div id="choseEvent" class="modal fade">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:0;">
              <div class="modal-header">
               
                <button type="button" class="btn-close" data-bs-dismiss="modal"><span class="visually-hidden">close</span></button>
              </div>
              <div id="modalBody2" class="modal-body">
                <form>
                  
                  <button type="button" class="btn btn-outline-danger" id="expensebtn">Expenses</button>
                <button type="button" class="btn btn-icon-text btn-linkedin" id="activity">Activity</button>
                </form>
              </div>
              
            </div>
          </div>
        
         
        </div> <!-- row -->
<!-- create -->
        <div id="createEventModal" class="modal fade">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:0;">
              <div class="modal-header">
                <h4 id="modalTitle2" class="modal-title">Create New Activity</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><span class="visually-hidden">close</span></button>
              </div>
              <div id="modalBody2" class="modal-body">
                <form>
                  <div class="mb-3">
                    <label for="title" class="form-label">Activity Title</label>
                    <input type="text" name="title" class="form-control" id="title" required />
                      <span id="titleError" class="text-danger"></span>
                  </div>
                  
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" id="saveBtn" class="btn btn-icon-text btn-linkedin">Save Activity</button>
                
              </div>
            </div>
          </div>
        
         
        </div> <!-- row -->

       

   

            </div>
     

    @include('admin.body.footer')

    
        </div>
    </div>

<!-- core:js -->
    <script src="{{ asset('Backend/assets/vendors/core/core.js') }}"></script>
  <!-- <script src="{{ asset('Backend/assets/vendors/sweetalert2/sweetalert2.min.js') }}"></script> -->

    <!-- endinject -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> -->
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
  <!-- <script src="{{ asset('Backend/assets/js/sweet-alert.js') }}"></script> -->
    <!-- End custom js for this page -->

    <!-- Plugin js for this page -->
<script src="{{ asset('Backend/assets/vendors/moment/moment.min.js') }}"></script>
<script src="{{ asset('Backend/assets/vendors/fullcalendar/main.min.js') }}"></script>

    <!-- endinject -->




    <!-- End custom js for this page -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> -->


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


   <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
  // sample calendar events data

  var Draggable = FullCalendar.Draggable;
  var calendarEl = document.getElementById('fullcalendar');
  var containerEl = document.getElementById('external-events');

  var curYear = moment().format('YYYY');
  var curMonth = moment().format('MM');


  // Calendar Event Source
  var programes = @json($records);
  var expense = @json($exp);
 
  var calendarEvents = {
    id: programes['id'],
    backgroundColor: 'rgba(1,104,250, .15)',
    borderColor: '#0168fa',
    events: programes
  };

  

  // initialize the calendar
  var calendar = new FullCalendar.Calendar(calendarEl, {
    headerToolbar: {
      left: "prev,today,next",
      center: 'title',
      right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
    },
    editable: true,
    droppable: true, // this allows things to be dropped onto the calendar
    fixedWeekCount: true,
   selectable: true,
    // height: 300,
    initialView: 'dayGridMonth',
    timeZone: 'UTC',
    hiddenDays:[],
    navLinks: 'true',
    // weekNumbers: true,
    // weekNumberFormat: {
    //   week:'numeric',
    // },
    dayMaxEvents: 4,
    events: [],
    // , birthdayEvents, holidayEvents, discoveredEvents, meetupEvents, otherEvents
    eventSources: [calendarEvents],
   
     eventDrop: function(info) {
      
        var obj = info.event;
            var title = obj.title;
           var id = obj.id;
           var start_date = obj.startStr;
           var end_date = obj.endStr;

                    $.ajax({
                            url:"/calendar/store",
                            type:"POST",
                            dataType:'json',
                            data:{
                                id:id,
                              title: title,
                              start: start_date,
                              end: end_date,
                              type: 'update'
                          },
                            success:function(response)
                            {
                              swal("Good job!", "Event Updated!", "success");
                                
                            },
                            error:function(error)
                            {
                                console.log(error);
                            },
                        });
                },
    eventClick: function(info) {
       var eventObj = info.event;
      $('#modalTitle1').html(eventObj.title);
      $('#modalBody1').html(eventObj._def.extendedProps.description);
      $('#viewEvent').attr('href','/event-record/'+ eventObj.id);
      $('#fullCalModal').modal("show");

   $('#removeEvent').click(function() {

    if(confirm("Are you sure you want to remove it?"))
            {
                var id = eventObj.id;
                
                $.ajax({
                    url:"/calendar/store",
                    type:"POST",
                    data:{
                        id:id,
                        type:"delete"
                    },
                    success:function(response)
                    {
                       $('#fullCalModal').modal('hide');
                       swal("Good job!", "Event deleted!", "success");
                               
                    }
                })
            }

  });
    

     
      
    },
    eventMouseEnter:function(info){
      // var eventObj = info.event;
      // $('#modalTitle1').html(eventObj.title);
      // $('#modalBody1').html(eventObj._def.extendedProps.description);
      // $('#viewEvent').attr('href','/event-record/'+ eventObj.id);
      // $('#fullCalModal').modal("show");

    },

    select:function( info ) {
       $("#createEventModal").modal("show");
     

      $('#saveBtn').click(function(){
        var title = $('#title').val();
         var start_date = info.startStr;
         var end_date = info.endStr;
        if(title != ''){
           $.ajax({
                            url:"/calendar/store",
                            type:"POST",
                            data:{
                              title: title,
                              start: start_date,
                              end: end_date,
                              type: 'add'
                          },
                            success:function(response)
                            {
                                swal("Good job!", "Event Created!", "success");
                                $('#createEventModal').modal('hide');

                             
  
                            },
                            error:function(error)
                            {
                              console.log(error);
                                if(error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors.title);
                                }
                            },
                        });

        }else{
          $('#titleError').html('Event Title is required!');
        }
        
          
      });
      
    },

  });

  calendar.render();


});  


      </script>

</body>
</html>    