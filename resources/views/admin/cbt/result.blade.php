@section('title')
 {{ $topic->name }} - Result
@endsection
@extends('admin.admin_dashboard_new')
@section('admin2')

<!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
	<div class="row">
        <div class="col-lg-12">

            <!-- Create Task Card -->
            <div class="card">
                <div class="card-header card-bg">
                      <h2>{{ $topic->name }} - Result</h2>
                </div>

                <div class="card-body">
             
                      

<div class="card p-3">
    <h4>Score: {{ $score }} / {{ $total }}</h4>
    <h4>Percentage: {{ number_format($percentage, 2) }}%</h4>

    @if ($percentage >= 50)
        <div class="alert alert-success mt-2">Congratulations! You passed.</div>
    @else
        <div class="alert alert-danger mt-2">You did not pass.</div>
    @endif

    <a href="{{ route('topics.index') }}" class="btn btn-primary mt-3">Back to Topics</a>
</div>


                </div>
            </div>

         </div>
     </div>       
</div>
   

   @endsection