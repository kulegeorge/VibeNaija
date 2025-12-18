@section('title')
  Questions in: {{ $topic->name }}
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
                  <h2>Questions in: {{ $topic->name }}</h2>
                </div>

                <div class="card-body">
                	

<a href="{{ route('questions.create', $topic->id) }}" class="btn btn-primary">Add Question</a>

@foreach ($questions as $q)
    <div class="card mt-3 p-3">
        <h5>{{ $q->question }}</h5>
        <p>A: {{ $q->option_a }}</p>
        <p>B: {{ $q->option_b }}</p>
        <p>C: {{ $q->option_c }}</p>
        <p>D: {{ $q->option_d }}</p>
        <strong>Correct: {{ strtoupper($q->correct_option) }}</strong>
    </div>
@endforeach

                </div>
            </div>

         </div>
     </div>       
</div>
   

   @endsection