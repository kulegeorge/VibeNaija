@section('title')
  New Layout
@endsection

@extends('admin.admin_dashboard_new')
@section('admin2')


 
    <!-- [ Main Content ] start -->
    <div class="pc-container">
      <div class="pc-content">
        <!-- [ breadcrumb ] start -->
<div class="page-header">
  <div class="page-block">
    <div class="row align-items-center">
      <div class="col-md-12">
        <div class="page-header-title">
          <h5 class="mb-0">Dashboard-active</h5>
        </div>
      </div>
      <div class="col-md-12">
        <ul class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="https://demo.dashboardpack.com/dashboard/index.html">Home</a></li>
          <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
          <li class="breadcrumb-item" aria-current="page">Dashboard-active</li>
        </ul>
      </div>
    </div>
  </div>
</div>
<!-- [ breadcrumb ] end -->

        <!-- [ Main Content ] start -->
        <div class="row">
          <!-- [ bitcoin-wallet section ] start-->
          <div class="col-md-6 col-xl-4">
            <div class="card bg-brand-color-1 bitcoin-wallet">
              <div class="card-body">
                <h5 class="text-white mb-2">Users</h5>
                <h2 class="text-white mb-2 f-w-300">$9,302</h2>
                <span class="text-white d-block">Ratings by Market Capitalization</span>
                <i class="ti ti-users f-70 text-white"></i>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="card bg-brand-color-2 bitcoin-wallet">
              <div class="card-body">
                <h5 class="text-white mb-2">Subscribers</h5>
                <h2 class="text-white mb-2 f-w-300">$8,101</h2>
                <span class="text-white d-block">Ratings by Market Capitalization</span>
                <i class="ti ti-currency-dollar f-70 text-white"></i>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-xl-4">
            <div class="card bg-primary bitcoin-wallet">
              <div class="card-body">
                <h5 class="text-white mb-2">Total Tasks</h5>
                <h2 class="text-white mb-2 f-w-300">$7,501</h2>
                <span class="text-white d-block">Ratings by Market Capitalization</span>
                <i class="ti ti-currency-pound f-70 text-white"></i>
              </div>
            </div>
          </div>
          <!-- [ bitcoin-wallet section ] end-->

          
        </div>
        <!-- [ Main Content ] end -->
      </div>
    </div>
    <!-- [ Main Content ] end -->

@endsection