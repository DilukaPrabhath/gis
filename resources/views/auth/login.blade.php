<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <style type="text/css">
        /* Change the white to any color ;) */
    input:-webkit-autofill,
    input:-webkit-autofill:hover,
    input:-webkit-autofill:focus,
    input:-webkit-autofill:active  {
    -webkit-box-shadow: 0 0 0 30px white inset !important;
}
    </style>
    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('logintheam/fonts/material-icon/css/material-design-iconic-font.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('logintheam/css/style.css')}}">
</head>
<body>

    <div class="main">

        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="{{asset('logintheam/images/login2.svg')}}" alt="sing up image" style="padding-top: 20px;"></figure>
                        <!-- <a href="#" class="signup-image-link">Create an account</a> -->
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">{{ __('Login') }}</h2>
                        <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}" autocomplete="off">
                            @csrf

                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror f" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E Mail" autofocus style="background-color: white;" >
                                <div class="col-md-6">
                                @error('email')
                                    <span class="invalid-feedback col-md-12" style="color: red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror f" name="password" required autocomplete="current-password" placeholder="Password" >
                                <div class="col-md-6">
                                @error('password')
                                    <span class="invalid-feedback col-md-12" style="color: red;" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group d-block" style="display: none;">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember-me" class="label-agree-term"><span><span></span></span> {{ __('Remember Me') }}</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="{{ __('Login') }}"/>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('logintheam/js/jquery.min.js')}}"></script>
    <script src="{{asset('logintheam/js/main.js')}}"></script>
</body>
</html>
