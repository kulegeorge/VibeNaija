@section('title')
  Compose New Email
@endsection
@extends('admin.admin_dashboard_new')
@section('admin2')

<!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
<div class="card">
    <div class="card-header card-bg">
        <h5 class="text-white">Send Custom Email</h5>
    </div>

    <div class="card-body">
        <form id="composeForm" method="POST" action="{{ route('emails.send') }}">
            @csrf

            <div class="mb-3">
                <label>Audience</label>
                <select name="audience" class="form-control" required>
                    <option value="users">Users</option>
                    <option value="subscribers">Subscribers</option>
                    <option value="both">Users & Subscribers</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Subject</label>
                <input type="text" name="subject" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email Body</label>
                <textarea name="body" rows="8" class="form-control" required></textarea>
            </div>

            <button class="btn btn-primary" type="submit">
                Send Emails
            </button>
            <div id="loading-spinner" style="display:none; text-align:center; margin-top:15px;"></div>
        </form>
    </div>
</div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {

    const form = document.getElementById("composeForm");
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
