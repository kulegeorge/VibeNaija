


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
    dayMaxEvents: 2,
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

                                alert("Good job!", "Event Updated!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                },
    eventClick: function(info) {

      var eventObj = info.event;

     
      $('#modalTitle1').html(eventObj.title);
      $('#modalBody1').html(eventObj._def.extendedProps.description);
      $('#eventUrl').attr('href',eventObj.url);
      $('#fullCalModal').modal("show");
    },

    select:function( info ) {
      $("#createEventModal").modal("show");

      $('#saveBtn').click(function(){
        var title = $('#title').val();
         var start_date = info.startStr;
         var end_date = info.endStr;
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

                              
                                $('#createEventModal').modal('hide');

                              
                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors.title);
                                }
                            },
                        });
      });
      
    },
  });

  calendar.render();


});   
      </script>