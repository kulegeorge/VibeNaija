<!DOCTYPE html>
<html lang="en-us">
<head>

    <meta charset="utf-8" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Vibe Nigeria</title>

    <meta name="Vibe Nigeria" content="Vibe Nigeria">
    <meta name="description" content="VibeNaija is an online cultural immersion platform designed to help Nigerian teenagers and young adults in the diaspora and at home, reconnect with their roots through interactive social and cultural challenges.
The platform will combine learning, fun, and community through weekly or monthly cultural tasks that promote Nigerian traditions, language, history, music, and lifestyle — all presented in a gamified way (points, badges, and levels).
The long-term vision is to create a global online community of young Nigerians who celebrate and share their heritage proudly.
">

    
    

    <!-- CSS files -->
    <link href="{{ asset('Frontend/fonts/Montserrat.css')}}" rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
    <link href="https:{{ asset('Frontend/css/font-awesome.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Frontend/css/void.css') }}" id="_include_elegant_font">

    <link rel="stylesheet" href="{{ asset('Frontend/plugins/rs-plugin/css/settings.css') }}" media="screen">
    <link rel="stylesheet" href="{{ asset('Frontend/css/void.css') }}" id="_include_owl_carousel">
    
    <link rel="stylesheet" href="{{ asset('Frontend/plugins/magnific-popup/magnific-popup.css') }}">
    


    
    <!-- Main CSS file -->
    <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
    
    <link rel="stylesheet" href="{{ asset('Backend/assets/images/favicon.png') }}">
<style>
    /* FORCE ALL TASK IMAGES TO BE SAME SIZE */
    .task-img {
        width: 100%;
        height: 220px;            /* fixed height for equal cards */
        object-fit: cover;        /* crop perfectly */
        border-radius: 10px;
        display: block;
    }

    /* FIX LABELS (TAG / BADGE STYLES) */
    .task-badges {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-top: 10px;
    }

    .task-badge {
        background: #f7f7f7;
        border: 1px solid #ddd;
        padding: 6px 10px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        color: #333;
    }

    .task-badge.star {
        background: #ffe28a;
        border-color: #d6b85a;
    }

    .image-wrapper {
    overflow: hidden;
    border-radius: 10px;
}

.task-thumb {
    width: 100%;
    height: 220px;
    object-fit: cover;
    transition: transform .35s ease;
}

.task-thumb:hover {
    transform: scale(1.08);
}

</style>


    

</head>
<body>

<div id="preloader">
    <div id="status">&nbsp;</div>
</div>



<!-- Global Wrapper -->
<div id="wrapper">


    <div class="h-wrapper">

        <!-- Top Bar -->
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="top-menu">
                            <li><a href="#aboutus">About</a></li>
                        
                            <li><a href=" {{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Sign Up</a></li>
                        </ul>
                    </div>
                    <!-- This column is hidden on mobiles -->
                    <div class="col-sm-6">
                        <div class="pull-right hidden-xs">
                            <ul class="social-icon unstyled">
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
        @include('frontend.body.header')

    </div>

    <!-- Do not remove this class -->
    <div class="push-top"></div>

    <!-- Slider -->
    @include('frontend.body.slider')
    <!-- END Slider-->



    <section class="section mt40">
        
           <div class="container text-center mt-5">
    <h2>You’ve been unsubscribed</h2>
    <p>You will no longer receive emails from us.</p>
</div>
        
    </section>

   



    <!-- Footer wrapper -->
    @include('frontend.body.footer')
    
</div> <!-- END Global Wrapper -->




    <!-- Javascript files -->
    
     <script src="{{ asset('Frontend/js/jquery.min.js') }}"></script>
    <script src="{{ asset('Frontend/js/bootstrap.min.js') }}"></script>
    <div id="_include_main_plugins"></div>
    
    <script src="{{ asset('Frontend/plugins/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    

<script src="{{ asset('Frontend/_demo/rs-slider.js') }}"></script>


    <div id="_include_main_plugins"></div>
    <div id="_include_owl_carousel"></div>
    <div id="_include_isotope"></div>
    
    <!-- Main javascript file -->
    <script src="{{ asset('Frontend/js/script.js') }}"></script>


    

</body>
</html>


