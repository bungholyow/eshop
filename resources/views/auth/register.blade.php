<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Register | Eshop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets/auth/images/favicon.ico')}}">

    <!-- Bootstrap Css -->
    <link href="{{asset('assets/auth/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/auth/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/auth/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">

                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="/" class="auth-logo">
                                <img src="{{asset('assets/auth/images/logo-dark.png')}}" height="30" class="logo-dark mx-auto" alt="">
                                <img src="{{asset('assets/auth/images/logo-light.png')}}" height="30" class="logo-light mx-auto" alt="">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Register</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                            @csrf


                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <!-- <x-input-label for="name" :value="__('Name')" /> -->
                                    <x-text-input id="name" for="name" :value="__('Name')" class="form-control" type="text" name="name" :value="old('name')" placeholder="Name" required autofocus />
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <!-- <x-input-label for="email" :value="__('Email')" /> -->
                                    <x-text-input id="email" for="email" :value="__('Email')" class="form-control" type="email" name="email" :value="old('email')" placeholder="Email" required />
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>



                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <!-- <input class="form-control" type="password" required="" placeholder="Password"> -->
                                    <!-- <x-input-label for="password" :value="__('Password')" /> -->

                                    <x-text-input id="password" for="password" :value="__('Password')" class="form-control" type="password" name="password" required autocomplete="new-password" placeholder="Password" />

                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <!-- <input class="form-control" type="password" required="" placeholder="Confirm Password"> -->
                                    <!-- <x-input-label for="password_confirmation" :value="__('Confirm Password')" /> -->

                                    <x-text-input id="password_confirmation" for="password_confirmation" :value="__('Confirm Password')" class="form-control" type="password" name="password_confirmation" required placeholder="Confirm Password" />

                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>

                            <div class="form-group mb-3 row">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="form-label ms-1 fw-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group text-center row mt-3 pt-1">
                                <div class="col-12">
                                    <button class="btn btn-info w-100 waves-effect waves-light" type="submit"> {{ __('Register') }}</button>
                                </div>
                            </div>

                            <div class="form-group mt-2 mb-0 row">
                                <div class="col-12 mt-3 text-center">
                                    <a href="{{ route('login') }}" class="text-muted"> {{ __('Already registered?') }}</a>
                                </div>
                            </div>
                        </form>
                        <!-- end form -->
                    </div>
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->


    <!-- JAVASCRIPT -->
    <script src="{{asset('assets/auth/libs/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/auth/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/auth/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/auth/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/auth/libs/node-waves/waves.min.js')}}"></script>

    <script src="{{asset('assets/auth/js/app.js')}}"></script>

</body>

</html>