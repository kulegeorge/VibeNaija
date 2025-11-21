 @extends('admin.admin_dashboard')
@section('admin')

<div class="container" style="padding-top:80px;">
        


        <!-- [ Main Content ] start -->
        <div class="row">
<div class="col-lg-12">

    <div class="card">
        <div class="card-header">
                   <h5 class="mb-3">Edit Level:</h5>
              </div>
        <div class="card-body">

            <form id="updateLevelForm" action="{{ route('level.update', $level->id) }}" 
                  method="POST" 
                  enctype="multipart/form-data">
                @csrf

               

              

                {{-- Level Name --}}
                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Level Name:</label>
                    <div class="col-lg-6">
                        <input type="text" 
                               name="level_name" 
                               value="{{ old('level_name', $level->level_name) }}" 
                               class="form-control"
                               required />
                        @error('badge_name') 
                            <p style="color:red;">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

                {{-- Badge Description --}}
                <div class="mb-3 row">
                    <label class="col-lg-4 col-form-label text-lg-end">Level Description</label>
                    <div class="col-lg-6">
                        <textarea class="form-control" name="level_description">{{ old('level_description', $level->level_description) }}</textarea>
                        @error('level_description') 
                            <p style="color:red;">{{ $message }}</p> 
                        @enderror
                    </div>
                </div>

               

               


                {{-- Submit --}}
                <div class="mb-3 row">
                    <label class="col-lg-4"></label>
                    <div class="col-lg-6"> 
                        <button class="btn btn-primary" type="submit">
                            Update Level 
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
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("updateLevelForm");
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
