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
          <h5 class="mb-0">Welcome to Dashboard</h5>
        </div>
      </div>
      <div class="col-md-12">
        <ul class="breadcrumb mb-0">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
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
                <h5 class="text-white mb-2">Total Users</h5>
                <h2 class="text-white mb-2 f-w-300">Users: {{ $users }}</h2>
                <span class="text-white d-block">All active users on the Platform</span>
               
              </div>
            </div>
          </div>
          <div class="col-md-6 col-xl-4">
            <div class="card bg-brand-color-2 bitcoin-wallet">
              <div class="card-body">
                <h5 class="text-white mb-2">Total Subscribers</h5>
                <h2 class="text-white mb-2 f-w-300">Subscribers: {{ $subscriber }}</h2>
                <span class="text-white d-block">All subscribers on the Platform</span>
              
              </div>
            </div>
          </div>
          <div class="col-md-12 col-xl-4">
            <div class="card bg-primary bitcoin-wallet">
              <div class="card-body">
                <h5 class="text-white mb-2">Total Tasks</h5>
                <h2 class="text-white mb-2 f-w-300">Tasks: {{ $task }}</h2>
                <span class="text-white d-block">Number of Tasks created by Admin</span>
             
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