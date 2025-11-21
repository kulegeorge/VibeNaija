@extends('admin.admin_dashboard')
@section('admin')

<div class="container" style="padding-top:80px;">
        


        <!-- [ Main Content ] start -->
        <div class="row">
<div class="col-lg-12">

    <div class="card">
        <div class="card-header">
                  <h5 class="mb-3">Create Level:</h5>
              </div>
        <div class="card-body">
            <form id="LevelForm" action="{{ route('levels.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf

          
              

                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Level Name:</label>
                    <div class="col-lg-6">
                        <input type="text" name="level_name" value="{{ old('level_name') }}" class="form-control" placeholder="Enter Level Name" required />
                        @error('level_name') <p style="color:red;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Level Description</label>
                    <div class="col-lg-6">
                        <textarea name="level_description" class="form-control">{{ old('level_description') }}</textarea>
                        @error('level_description') <p style="color:red;">{{ $message }}</p> @enderror
                    </div>
                </div>

                


                <div class="mb-3 row">
                    <label class="col-lg-4"></label>
                    <div class="col-lg-6">
                        <button class="btn btn-primary" type="submit">
                            Create Level
                        </button>
                    </div>
                </div>
<div id="loading-spinner" style="display:none; text-align:center; margin-top:15px;">
            </form>
        </div>
    </div>

    {{-- Level Table --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5>Levels</h5>
        </div>

        <div class="card-body">
            <div class="dt-responsive table-responsive">

                <table class="table table-sm table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>Levels ID</th>
                            <th>Levels Name</th>
                            <th>Description</th>
                           
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(!empty($levels) && $levels->count())
                            @foreach($levels as $level)
                                <tr>
                                    <td>{{ $level->id }}</td>
                                    <td>{{ $level->level_name }}</td>
                                    <td>{{ $level->level_description }}</td>
                                   

                                    <td>

                                        {{-- EDIT BUTTON --}}
                                        <a href="{{ route('level.edit', $level->id) }}" class="btn btn-primary">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit
                                        </a>

                                        {{-- DELETE BUTTON --}}
                                        <form action="{{ route('level.delete', $level->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger" onclick="return confirm('Delete this Level?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5">No Levels found.</td></tr>
                        @endif
                    </tbody>

                </table>

            </div>
        </div>
    </div>

</div>
</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("LevelForm");
    const submitBtn = form.querySelector("button[type='submit']");
    const spinner = document.getElementById("loading-spinner");

    form.addEventListener("submit", function (e) {
        e.preventDefault(); // Stop immediate submission

        // Disable button & show loading state
        submitBtn.disabled = true;
        submitBtn.innerHTML = 'Processing <img id="loading-spinner" src="/images/loader.gif" width="20">';

        // Show spinner
        spinner.style.display = "block";

        // Submit after 3 seconds
        setTimeout(() => {
            form.submit();
        }, 3000);
    });

});
</script>
@endsection
