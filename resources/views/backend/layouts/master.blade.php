<!doctype html>
<html lang="en">

<head>
    @include('backend.layouts.head')
</head>

<body class="theme-blue">



    @include('backend.layouts.loader')


    <div id="wrapper">

        @include('backend.layouts.nav')

        @include('backend.layouts.sidebar')


        @yield('content')



    </div>

    @include('backend.layouts.footer')

</body>

</html>