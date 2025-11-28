@extends('admin.admin_dashboard')
@section('admin')

<div class="container" style="padding-top:80px;">
	<div class="row">
        <div class="col-lg-12">

            <!-- Create Task Card -->
            <div class="card">
                <div class="card-header">
                            <h2>{{ $topic->name }} - CBT Test </h2>
                </div>

                <div class="card-body">
    

<form method="POST" action="{{ route('cbt.submit') }}">
    @csrf

    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
        <input type="hidden" name="task_id" value=" {{$taskId}}">

    @foreach ($questions as $i => $q)
        <div class="card p-3 mb-3">
            <p><strong>{{ $i+1 }}. {{ $q->question }}</strong></p>
           

            <input type="hidden" name="question_id[]" value="{{ $q->id }}">
        

            <label><input type="radio" name="selected_option[{{ $i }}]" value="a"> {{ $q->option_a }}</label><br>
            <label><input type="radio" name="selected_option[{{ $i }}]" value="b"> {{ $q->option_b }}</label><br>
            <label><input type="radio" name="selected_option[{{ $i }}]" value="c"> {{ $q->option_c }}</label><br>
            <label><input type="radio" name="selected_option[{{ $i }}]" value="d"> {{ $q->option_d }}</label><br>
        </div>
    @endforeach

    <button class="btn btn-success">Submit</button>
</form>

                </div>
            </div>

         </div>
     </div>       
</div>
   

   @endsection