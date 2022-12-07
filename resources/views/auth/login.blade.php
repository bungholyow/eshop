<!doctype html>
<html lang="en">

<head>
    <title>Eshop :: Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta name="description" content="Lucid Bootstrap 4.1.1 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/css/color_skins.css') }}">
</head>

<body class="theme-blue">
    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap ">
            <div class="vertical-align-middle auth-main">
                <div class="auth-box">
                    <div class="top">
                        <img src="{{ asset('backend/assets/images/logo.svg') }}" alt="Lucid" class="object-center">
                    </div>

                    <div class="card" ;>

                        <div class="header place-content-center ">
                            <p class="lead">Login to your account</p>
                        </div>
                        <div class="body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email" :value="__('Email')" class="control-label sr-only">Email</label>
                                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" placeholder="Email" required autofocus>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>



                                <div class="form-group">
                                    <label for="password" :value="__('Password')" class="control-label sr-only">Password</label>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" placeholder="Password">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>


                                <div class="block mt-4">
                                    <label for="remember_me" class="inline-flex items-center">
                                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                                        <span class="ml-1 text-base text-gray-300">{{ __('Remember me') }}</span>
                                    </label>
                                </div>

                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <div class="bottom">
                                    @if (Route::has('password.request'))
                                    <span class="helper-text m-b-10"><i class="fa fa-lock"></i> <a href="{{ route('password.request') }}">Forgot password?</a></span>
                                    @endif
                                    <span>Don't have an account? <a href="{{ route('register') }}">Register</a></span>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->

    <!-- Javascript -->
    <script src="{{ asset('backend/assets/bundles/libscripts.bundle.js') }}"></script>
    <script src="{{ asset('backend/assets/bundles/vendorscripts.bundle.js') }}"></script>

    <script src="{{ asset('backend/assets/bundles/mainscripts.bundle.js') }}"></script>
</body>

</html>