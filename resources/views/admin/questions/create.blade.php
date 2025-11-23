@extends('admin.admin_dashboard')
@section('admin')

<div class="container" style="padding-top:80px;">
	<div class="row">
        <div class="col-lg-12">

            <!-- Create Task Card -->
            <div class="card">
                <div class="card-header">
                     <h2>Add Question to: {{ $topic->name }}</h2>
                </div>

                <div class="card-body">
             

<form method="POST" action="{{ route('questions.store', $topic->id) }}">
    @csrf

    <div class="mb-3">
        <label>Question</label>
        <textarea name="question" class="form-control" required></textarea>
    </div>

    <div class="mb-3">
        <label>Option A</label>
        <input type="text" name="option_a" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Option B</label>
        <input type="text" name="option_b" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Option C</label>
        <input type="text" name="option_c" class="form-control">
    </div>

    <div class="mb-3">
        <label>Option D</label>
        <input type="text" name="option_d" class="form-control">
    </div>

    <div class="mb-3">
        <label>Correct Option</label>
        <select name="correct_option" class="form-control">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
        </select>
    </div>

    <button class="btn btn-success">Save Question</button>
</form>

                </div>
            </div>

         </div>
     </div>       
</div>
   

   @endsection