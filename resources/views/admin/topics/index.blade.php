@section('title', 'Vibe Nigeria- Quiz page')
@extends('admin.admin_dashboard_new')
@section('admin2')

<!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
    <div class="row">
        <div class="col-lg-12">

            <!-- Topics Card -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="fa-solid fa-book-open"></i> Topics
                    </h5>
                </div>

                <div class="card-body">

                    <!-- Create Topic Button -->
                    <a href="{{ route('topics.create') }}" class="btn btn-primary mb-3">
                        <i class="fa-solid fa-plus"></i> Create Topic
                    </a>
<div class="alert alert-warning">Admininstrators should not take quiz from here because every quiz must associated with a Task</div>
                    @foreach ($topics as $topic)
                        <div class="card mb-3 shadow-sm border-0">
                            <div class="card-body d-flex justify-content-between align-items-center">

                                <!-- Topic Title -->
                                <h4 class="mb-0">
                                    <i class="fa-solid fa-folder-open text-warning"></i>
                                    {{ $topic->name }}
                                    <p class="text-muted" style="font-size:10px;">{{ Str::limit($topic->description, 90) }}
</p>

                                </h4>

                                <div>
                                    <!-- View Questions -->
                                    <a href="{{ route('questions.index', $topic->id) }}" class="btn btn-outline-secondary me-2">
                                        <i class="fa-solid fa-list"></i> View Questions
                                    </a>

                                 

                                    @php
    $attempted = \App\Models\UserAnswer::where('user_id', auth()->id())
        ->whereIn('question_id', $topic->questions->pluck('id'))
        ->exists();


@endphp

@if(!$attempted)
    <a href="{{ route('cbt.start', [
        'topic' => encrypt($topic->id),
        'task'  => encrypt($topic->id)
    ]) }}" class="btn card-bg">
        <i class="fa-solid fa-play"></i> 
        Start CBT
    </a>
@else
    <button class="btn btn-secondary" disabled>
        Attempt Completed
    </button>
    <a href="{{ route('cbt.result', $topic->id) }}" class="btn btn-info">View Result</a>
@endif

                                </div>

                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>       
</div>

@endsection
