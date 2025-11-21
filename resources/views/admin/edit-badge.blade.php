@extends('admin.admin_dashboard')
@section('admin')

<div class="container" style="padding-top:80px;">
        


        <!-- [ Main Content ] start -->
        <div class="row">
<div class="col-lg-12">

    <div class="card">
        <div class="card-header">
               <h5 class="mb-3">Edit Badge:</h5>
              </div>

            <form id="updateBadgeForm" action="{{ route('badge.update', $badge->id) }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf

              

               

                {{-- Badge Name --}}
                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Badge Name:</label>
                    <div class="col-lg-6">
                        <input type="text" 
                               name="badge_name" 
                               value="{{ old('badge_name', $badge->badge_name) }}" 
                               class="form-control"
                               required />
                        @error('badge_name') 
                            <p style="color:red;">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                {{-- Badge Description --}}
                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Badge Description</label>
                    <div class="col-lg-6">
                        <textarea class="form-control" name="badge_description">{{ old('badge_description', $badge->badge_description) }}</textarea>
                        @error('badge_description') 
                            <p style="color:red;">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                {{-- Badge Points --}}
                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Badge Points</label>
                    <div class="col-lg-6">
                        <input type="number"
                               class="form-control"
                               name="points"
                               value="{{ old('points', $badge->points) }}"
                               required />
                        @error('points') 
                            <p style="color:red;">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                {{-- Current Image --}}
                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Current Image</label>
                    <div class="col-lg-6">
                        @if($badge->badge_image)
                            <img src="{{ asset($badge->badge_image) }}" 
                                 class="img-thumbnail" 
                                 width="120" />
                        @else
                            <p>No image uploaded</p>
                        @endif
                    </div>
                </div>

                {{-- File Upload --}}
                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Upload New Image</label>
                    <div class="col-lg-6">
                        <input name="file" type="file" class="form-control">
                        <small class="text-muted">Leave empty to keep the current image.</small>
                    </div>
                </div>

                {{-- Submit --}}
                <div class="mb-3 row">
                    <label class="col-lg-4"></label>
                    <div class="col-lg-6"> 
                        <button class="btn btn-primary" type="submit">
                            Update Badge 
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path></svg>
                        </button>
                    </div>
                </div>
<div id="loading-spinner" style="display:none; text-align:center; margin-top:15px;">
    
  
</div>
            </form>

        </div>

    </div>

</div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("updateBadgeForm");
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
