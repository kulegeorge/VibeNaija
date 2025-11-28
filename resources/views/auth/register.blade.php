<!DOCTYPE html>
<html lang="en-us">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Naija Vibe — Create Account</title>

    <!-- SEO -->
    <meta name="author" content="VibeNaija">
    <meta name="description" content="Join VibeNaija — the online cultural immersion platform connecting young Nigerians globally through fun cultural challenges, language learning, and community engagement.">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/void.css') }}">

<style>
    html, body {
        height: auto !important;
        overflow-y: auto !important;
    }

    body {
        background: #f8f9fc;
        font-family: 'Montserrat', sans-serif;
    }

    .auth-wrapper {
        margin-top: 70px;
    }

    .auth-card {
        background: #fff;
        border-radius: 12px;
        padding: 35px 40px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    }

    .auth-card h3 {
        font-weight: 600;
    }

    .auth-side-info {
        background: linear-gradient(135deg, #ffb703, #fb8500);
        padding: 40px;
        border-radius: 12px;
        color: #fff;
    }

    .auth-side-info h3 {
        font-size: 26px;
        font-weight: 700;
    }

    .auth-image {
        width: 100%;
        border-radius: 12px;
        margin-top: 25px;
    }

    /* FORM IMPROVEMENTS */
    .form-group {
        margin-bottom: 16px;
    }

    .form-control {
        height: 42px !important;
        border-radius: 8px;
        font-size: 14px;
        padding: 8px 12px;
    }

    .btn-d {
        background-color: #fb8500;
        border: none;
        width: 100%;
        padding: 12px;
        font-size: 15px;
        border-radius: 8px;
    }

    .btn-d:hover {
        background-color: #e27900;
    }

    .back-home {
        margin-top: 20px;
        display: block;
        font-weight: 600;
        color: #fb8500;
    }

    /* MOBILE FIXES */
    @media(max-width: 768px) {
        .auth-card {
            padding: 25px 20px;
        }

        .form-control {
            height: 40px;
        }

        .auth-side-info {
            padding: 25px;
        }
    }
</style>

</head>

<body>

<div id="wrapper">

    <section class="auth-wrapper">
        <div class="container mb-4">
            <a href="/" class="back-home">
                ← Back to Home
            </a>

            <div class="row justify-content-center align-items-cente mb-4r">

                <!-- LEFT INFO PANEL -->
                <div class="col-md-5 mb-4 mb-md-0">
                    <div class="bg-light">
                        <h3>Join VibeNaija Today 🎉</h3>
                        <p>Connect with young Nigerians worldwide, participate in cultural tasks, unlock badges, move up levels, and celebrate your heritage through fun, interactive activities.</p>

                      <!--   <div class="mt-4">
                            <h4><i class="fa fa-users"></i> Be part of a Global Community</h4>
                            <p>Learn, play, and grow with people who share your roots—no matter where you are.</p>
                        </div> -->

                        <!-- NEW IMAGE ADDED -->
                        <img src="{{ asset('Frontend/images/culture-img.jpg') }}" class="auth-image" alt="Culture Image" style="height: 300px; width: 300px;">
                    </div>
                </div>

                <!-- REGISTRATION FORM -->
                <div class="col-md-6">
                    <div class="auth-card">
                        <h3>Create an Account</h3>
                        <p class="text-muted mb-4">Already have an account? <a href="/login">Sign In</a></p>

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="form-group">
                                <input type="text" name="name" required class="form-control" placeholder="Full Name *">
                                <x-input-error :messages="$errors->get('name')" class="mt-1 text-danger" />
                            </div>

                            <div class="form-group">
                                <input type="email" name="email" required class="form-control" placeholder="Email *">
                                <x-input-error :messages="$errors->get('email')" class="mt-1 text-danger" />
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" required class="form-control" placeholder="Password *">
                                <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger" />
                            </div>

                            <div class="form-group">
                                <input type="password" name="password_confirmation" required class="form-control" placeholder="Confirm Password *">
                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-danger" />
                            </div>

                            <!-- <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Address (Optional)">
                            </div> -->

                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" placeholder="Phone Number">
                            </div>

                            <div class="form-group mt-2 d-flex align-items-center gap-2">
                                <input type="checkbox" name="terms" required>
                                <small>I agree to the <a href="#">Terms & Conditions</a> and <a href="#">Privacy Policy</a></small>
                            </div>

                            <button type="submit" class="btn btn-d mt-2">Register</button>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="footer-wrapper footer-bg">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <h3 class="footer-title">NaijaVibe</h3>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Terms</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <h3 class="footer-title">Follow Us</h3>
                    <ul class="footer-social">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    </ul>
                </div>

                <div class="col-md-4">
                    <p class="copyright mt-4">
                        &copy; 2025 NaijaVibe — All rights reserved.
                    </p>
                </div>

            </div>
        </div>
    </footer>

</div>

<script src="{{ asset('Frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('Frontend/js/bootstrap.min.js') }}"></script>

</body>
</html>
