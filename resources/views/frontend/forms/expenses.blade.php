
<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="description" content="Responsive HTML Admin Dashboard Template based on Bootstrap 5">
	<meta name="author" content="NobleUI">
	<meta name="keywords" content="nobleui, bootstrap, bootstrap 5, bootstrap5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<title>Exense Summary</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />


  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <!-- End fonts -->

	<!-- core:css -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/core/core.css') }}">
	<!-- endinject -->

	<!-- Plugin css for this page -->
	<!-- End plugin css for this page -->

	<!-- inject:css -->
	<link rel="stylesheet" href="{{ asset('Backend/assets/fonts/feather-font/css/iconfont.css') }}">
	<link rel="stylesheet" href="{{ asset('Backend/assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
	<!-- endinject -->

  <!-- Layout styles -->  
	<link rel="stylesheet" href="{{ asset('Backend/assets/css/demo1/style.css') }}">
  <!-- End layout styles -->

  <link rel="shortcut icon" href="{{ asset('Backend/assets/images/favicon.png') }}" />
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
 @if(session('status'))
                  <script> swal("Good job!", "{{session('status')}}", "success"); </script>

                   @endif
                    @if(session('error'))
                  <script> swal("Sorry!", "{{session('error')}}", "error"); </script>

                   @endif
				<div class="row">
					<div class="col-md-12 grid-margin">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Create New Expense</h6>
								<p><button type="button" id="addExpense" class="btn btn-primary btn-icon-text btn-xs"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-square"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Add Expense</button>
							</div>
						</div>
					</div>
				</div>

				

				<div class="row">
					<div class="col-xl-8 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Details: - {{ $event->title}}</h6>

                <div class="table-responsive">
                  <table id="dataTableExample" class="table">
                    <thead>
                      <tr>
                         <td>sl</td>
                        <th>Title</th>
                        <th>Amount</th>
                        <th>month</th>
                       
                        <th>Date</th>
                         <th>Action</th>


                      </tr>
                    </thead>
                    <tbody>
                      @if(!empty($exp))
                      @foreach($exp as $key => $value)
                      <tr>
                        <td>{{$key++}}</td>
                        <td>{{$value->title}}</td>
                       <td><span class="badge bg-danger">{{number_format( $value->amount, 0) }}</span></td> 
                        <td>{{$value->month}}</td>
                      
                        <td>{{$value->start}}</td>
                        <td>
                         <a href="{{ route('edit.expense', $value->id) }}"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>

                          <a href="{{ route('delete.expense', $value->id) }}">  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></a>
                        </td>

                       
                      </tr>
                       @endforeach
                     @endif
                    </tbody>
                  </table>
                </div>
          

               
							</div>
						</div>
					</div>
					<div class="col-xl-4 grid-margin stretch-card">
						<div class="card">
							<div class="card-body">
								<h6 class="card-title">Records chart</h6>
                <div id="apexPie"></div>
							</div>
						</div>
					</div>
				</div>
				
			
				

			</div>


		 @include('admin.body.footer')
	
		</div>
	</div>

   <!-- create -->
        <div id="expenseEventModal" class="modal fade">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius:0;">
              <div class="modal-header">
                <h4 id="modalTitle2" class="modal-title">Create New Expense Record</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"><span class="visually-hidden">close</span></button>
              </div>
              <div id="modalBody2" class="modal-body">
                <form>

                  <div class="mb-3">
                    <label for="title" class="form-label">Expense Title</label>
                    <input type="text" name="title" class="form-control" id="titleexpense" required />
                      <span id="titleexpenseError" class="text-danger"></span>
                  </div>
                   <div class="mb-3">
                    <label for="title" class="form-label">Amount</label>
                    <input type="text" name="amount" class="form-control" id="amtexpense" required />
                    <input type="hidden" name="start" class="form-control" id="start" value="{{$event->start}}" />
                    <input type="hidden" name="end" class="form-control" id="end" value="{{$event->end}}"  />
                    <input type="hidden" name="event_id" class="form-control" id="eventID" value="{{$event->id}}"  />
                 
                    


                      <span id="amtexpenseError" class="text-danger"></span>
                  </div>
                  
                </form>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" id="expenseSaveBtn" class="btn btn-icon-text btn-linkedin">Save Expense</button>
                
              </div>
            </div>
          </div>
        
         
        </div> <!-- row -->

	<!-- core:js -->
	<script src="{{ asset('Backend/assets/vendors/core/core.js') }}"></script>
	<!-- endinject -->

	<!-- Plugin js for this page -->
	<script src="{{ asset('Backend/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
	<!-- End plugin js for this page -->

	<!-- inject:js -->
	<script src="{{ asset('Backend/assets/vendors/feather-icons/feather.min.js') }}"></script>
	<script src="{{ asset('Backend/assets/js/template.js') }}"></script>
	<!-- endinject -->

	<!-- Custom js for this page -->

	<!-- End custom js for this page -->

 <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $('#addExpense').click(function(){
              $('#expenseEventModal').modal("show");
            });
            $('#expenseSaveBtn').click(function(){
                var exTitle = $('#titleexpense').val();
        var exAmount = $('#amtexpense').val();
        var id = $('#eventID').val();
        var start_ = $('#start').val();
        var end_ = $('#end').val();
        var month =  start_.substring(5, 7);

       if(exTitle != '' && exAmount != '' ){
         
                      $.ajax({
                            url:"/calendar/store",
                            type:"POST",
                            data:{
                              title: exTitle,
                              start: start_,
                              end: end_,
                              amount: exAmount,
                              month: month,
                             id: id,
                              type: 'addExpense'
                          },
                            success:function(response)
                            {
                               $('#expenseEventModal').modal('hide');
                                swal("Good job!", "Expense Event Created!", "success");
                               

                             
  
                            },
                            error:function(error)
                            {
                              console.log(error);
                                if(error.responseJSON.errors) {


                                    $('#titleexpenseError').html(error.responseJSON.errors.title);
                                }
                            },
                        });

        }else{
          $('#titleexpenseError').html('Expense Title is required!');
          $('#amtexpenseError').html('Expense Amount is required!');
        }

            });

        });

        $(function() {
  'use strict';

  var colors = {
    primary        : "#6571ff",
    secondary      : "#7987a1",
    success        : "#05a34a",
    info           : "#66d1d1",
    warning        : "#fbbc06",
    danger         : "#ff3366",
    light          : "#e9ecef",
    dark           : "#060c17",
    muted          : "#7987a1",
    gridBorder     : "rgba(77, 138, 240, .15)",
    bodyColor      : "#000",
    cardBg         : "#fff"
  }

  var fontFamily = "'Roboto', Helvetica, sans-serif"

   // Apex Pie chart end
  if ($('#apexPie').length) {
    var options = {
      chart: {
        height: 400,
        type: "pie",
        foreColor: colors.bodyColor,
        background: colors.cardBg,
        toolbar: {
          show: false
        },
      },
      theme: {
        mode: 'light'
      },
      tooltip: {
        theme: 'light'
      },
      colors: [colors.primary,colors.warning,colors.danger, colors.info],
      legend: {
        show: true,
        position: "top",
        horizontalAlign: 'center',
        fontFamily: fontFamily,
        itemMargin: {
          horizontal: 8,
          vertical: 0
        },
      },
      stroke: {
        colors: ['rgba(0,0,0,0)']
      },
      dataLabels: {
        enabled: true
      },
      series: [44, 55, 13, 33]
    };
    
    var chart = new ApexCharts(document.querySelector("#apexPie"), options);
    chart.render();  
  }
  // Apex Pie chart end

});

  </script>


</body>
</html>