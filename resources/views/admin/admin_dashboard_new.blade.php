<!doctype html>
<html lang="en">
<head>
    <title>@yield('title') | Vibe Nigeria</title>

    <!-- CSRF -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- Meta -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
    <meta name="description" content="VibeNaija is an online cultural immersion platform designed to help Nigerian teenagers and young adults reconnect with their roots through gamified cultural challenges." />
    <meta name="keywords" content="VibeNaija, Nigerian culture, dashboard, Bootstrap 5" />
    <meta name="author" content="VibeNaija" />
    <meta name="theme-color" content="#1e293b" />
    <meta name="color-scheme" content="light dark" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Vibe Nigeria Dashboard" />
    <meta property="og:description" content="Modern responsive dashboard built with Bootstrap 5." />
    <meta property="og:site_name" content="VibeNaija" />
<link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet"> 

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('New_Layout/assets/images/favicon.svg') }}" type="image/svg+xml">
    <link rel="apple-touch-icon" href="{{ asset('New_Layout/assets/images/apple-touch-icon.png') }}">
 

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('New_Layout/assets/css/plugins/phosphor-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('New_Layout/assets/css/plugins/tabler-icons.min.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('New_Layout/assets/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('New_Layout/assets/css/style-preset.css') }}">

    <!-- CDN (LEFT INTACT AS REQUESTED) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <style>
        .pc-content { background-color: #f2f2f2; }

        .sidebar-brand {
            opacity: 1;
            visibility: visible;
            transition: opacity 0.5s ease;
            font-weight: 700;
            font-size: 25px;
            color: #fff;
            direction: ltr;
        }

        .sidebar-brand span {
            color: #D18B21;
            font-weight: 300;
        }
        .bg-cus{
            background-color: #E9ECEF;
        }
.warning {
            background-color: rgb(251 188 6);
            
        }
.info {
    border:1px solid rgb(102 209 209);
}
        .carding {
    padding: var(--bs-card-cap-padding-y) var(--bs-card-cap-padding-x);
    margin-bottom: 0;
    color: var(--bs-card-cap-color);
    background-color: var(--bs-card-cap-bg);
    border-bottom: var(--bs-card-border-width) solid #f2f4f9;
}
    </style>
</head>

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme="light">

<!-- Preloader -->
<div class="loader-bg">
    <div class="loader-track">
        <div class="loader-fill"></div>
    </div>
</div>

@include('admin.body2.sidebar')

<div class="page-wrapper">
    @include('admin.body2.header')

    @yield('admin2')

    @include('admin.body2.footer')
</div>

<!-- ============================================ -->
<!-- PAGE JS -->
<!-- ============================================ -->

<!-- CDN JS (LEFT INTACT) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://js.pusher.com/7.2/pusher.min.js"></script>

<!-- Core JS -->
<script src="{{ asset('New_Layout/assets/js/plugins/popper.min.js') }}"></script>
<script src="{{ asset('New_Layout/assets/js/plugins/simplebar.min.js') }}"></script>
<script src="{{ asset('New_Layout/assets/js/plugins/bootstrap.min.js') }}"></script>
<script src="{{ asset('New_Layout/assets/js/plugins/i18next.min.js') }}"></script>
<script src="{{ asset('New_Layout/assets/js/plugins/i18nextHttp.min.js') }}"></script>

<script src="{{ asset('New_Layout/assets/js/script.js') }}"></script>
<script src="{{ asset('New_Layout/assets/js/theme.js') }}"></script>




<!-- Toastr Messages -->
<script>
@if(Session::has('message'))
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "timeOut": "5000"
    };

    toastr.{{ Session::get('alert-type','info') }}(
        {!! json_encode(Session::get('message')) !!}
    );
@endif
</script>


<!-- Laravel Echo (SAFE) -->
@if(Auth::check())
<!-- <script src="{{ asset('js/app.js') }}"></script> -->
<script>
    if (typeof Echo !== 'undefined') {
        Echo.private('notifications.{{ Auth::id() }}')
            .listen('NewNotificationEvent', (e) => {
                console.log('Notification:', e);

                let count = document.getElementById('notif-count');
                if (count) count.textContent = parseInt(count.textContent || 0) + 1;
            });
    }
</script>
@endif


<form id="global-logout-form" method="POST" action="{{ route('logout') }}" style="display:none;">
    @csrf
</form>

<script>
window.forceLogout = function () {
    document.getElementById('global-logout-form').submit();
};
</script
</body>
</html>
