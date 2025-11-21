@extends('admin.admin_dashboard')
@section('admin')
<div class="container" style="padding-top:80px;">
        


        <!-- [ Main Content ] start -->
        <div class="row">
<div class="col-lg-12">

    <div class="card">
        <div class="card-header">
                <h5 class="mb-3">Add Badge:</h5>
              </div>
        <div class="card-body">
            <form id="BadgeForm" action="{{ route('badge.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf

          
                

                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Badge Name:</label>
                    <div class="col-lg-6">
                        <input type="text" name="badge_name" value="{{ old('badge_name') }}" class="form-control" placeholder="Enter Badge Name" required />
                        @error('badge_name') <p style="color:red;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Badge Description</label>
                    <div class="col-lg-6">
                        <textarea name="badge_description" class="form-control">{{ old('badge_description') }}</textarea>
                        @error('badge_description') <p style="color:red;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Badge Points</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="points" placeholder="Points Earned" value="{{ old('points') }}" required />
                        @error('points') <p style="color:red;">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">File Upload</label>
                    <div class="col-lg-6">
                        <input name="file" type="file">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label class="col-lg-4"></label>
                    <div class="col-lg-6">
                        <button class="btn btn-primary" type="submit">
                            Create Badge
                        </button>
                    </div>
                </div>
<div id="loading-spinner" style="display:none; text-align:center; margin-top:15px;">
            </form>
        </div>
    </div>

    {{-- Badge Table --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5>Badges</h5>
        </div>

        <div class="card-body">
            <div class="dt-responsive table-responsive">

                <table class="table table-sm table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>Badge ID</th>
                            <th>Badge Name</th>
                            <th>Description</th>
                            <th>Points</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if(!empty($badges) && $badges->count())
                            @foreach($badges as $badge)
                                <tr>
                                    <td>{{ $badge->id }}</td>
                                    <td>{{ $badge->badge_name }}</td>
                                    <td>{{ $badge->badge_description }}</td>
                                    <td>{{ $badge->points }}</td>
                                    <td>
                                        <img src="{{ $badge->badge_image }}" width="60">
                                    </td>

                                    <td>

                                        {{-- EDIT BUTTON --}}
                                        <a href="{{ route('badge.edit', $badge->id) }}" class="btn btn-primary">
                                             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg> Edit
                                        </a>

                                        {{-- DELETE BUTTON --}}
                                        <form action="{{ route('badge.delete', $badge->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')

                                            <button class="btn btn-danger" onclick="return confirm('Delete this badge?')">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg> Delete
                                            </button>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr><td colspan="5">No badges found.</td></tr>
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

    const form = document.getElementById("BadgeForm");
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
