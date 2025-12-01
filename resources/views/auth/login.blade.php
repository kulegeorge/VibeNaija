<!DOCTYPE html>
<html lang="en-us">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Naija Vibe Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="{{ asset('Frontend/fonts/Montserrat.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/style.css') }}">

    <style>
        body {
            background: linear-gradient(to bottom right, #f9fafc, #ececec);
            font-family: 'Montserrat', sans-serif;
        }

        .login-wrapper {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 40px 15px;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.93);
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0px 8px 25px rgba(0,0,0,0.08);
            max-width: 450px;
            width: 100%;
        }

        .login-card h3 {
            font-weight: 700;
            margin-bottom: 10px;
            text-align: center;
        }

        .tagline {
            text-align: center;
            color: #666;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-group input {
            height: 48px;
            border-radius: 8px;
            padding-left: 40px;
        }

        .form-icon {
            position: relative;
        }

        .form-icon input {
            width: 100%;
        }

        .form-icon i {
            position: absolute;
            top: 12px;
            left: 12px;
            font-size: 18px;
            color: #888;
        }

        .btn-login {
            width: 100%;
            height: 48px;
            border-radius: 8px;
            font-weight: 600;
            background: #d1193e;
            border: none;
        }

        .btn-login:hover {
            background: #b01334;
        }

        .login-footer {
            margin-top: 25px;
            text-align: center;
        }

        .social-btn {
            width: 100%;
            margin-bottom: 10px;
            border-radius: 8px;
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

        @media (max-width: 450px) {
            .login-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    <div class="login-card">
        <h3>Welcome Back!</h3>
        <p class="tagline">Sign in to continue your cultural adventure 🇳🇬✨</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group mb-3">
                <div class="form-icon">
                    <i class="fa fa-user"></i>
                    <input type="text" name="login" required class="form-control" value="{{ old('login')}}"
                           placeholder="Email / Phone / Username">
                </div>
                <x-input-error :messages="$errors->get('login')" class="mt-1 text-danger" />
            </div>

            <div class="form-group mb-3">
                <div class="form-icon">
                    <i class="fa fa-lock"></i>
                    <input type="password" name="password" required class="form-control"
                           placeholder="Password">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-danger" />
            </div>

            <div class="d-flex justify-content-between mb-3">
                <label>
                    <input type="checkbox" name="remember" id="remember_me"> Remember me
                </label>
                <a href="{{ route('password.request') }}" class="text-danger"><small>Forgot Password?</small></a>
            </div>

            <button type="submit" class="btn btn-d text-white">Sign In</button>
        </form>

        <div class="login-footer">
            <p class="mb-1">Don't have an account?  
                <a href="/register" class="text-danger fw-bold">Create one</a>
            </p>
        </div>

        <hr>

        <p class="text-center">Or continue with</p>

        <button class="btn btn-primary social-btn"><i class="fa fa-facebook"></i> &nbsp; Continue with Facebook</button>
        <button class="btn btn-info social-btn"><i class="fa fa-twitter"></i> &nbsp; Continue with Twitter</button>
        <button class="btn btn-danger social-btn"><i class="fa fa-google-plus"></i> &nbsp; Continue with Google</button>

    </div>

</div>

<script src="{{ asset('Frontend/js/jquery.min.js') }}"></script>
<script src="{{ asset('Frontend/js/bootstrap.min.js') }}"></script>

</body>
</html>
