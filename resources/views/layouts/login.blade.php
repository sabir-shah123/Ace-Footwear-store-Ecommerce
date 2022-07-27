<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">


    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('assets/images/saa.png')}}" type="image/saa" />
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{asset('assets/lassets/fonts/fontawesome/css/fontawesome-all.min.css')}}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{asset('assets/lassets/plugins/animation/css/animate.min.css')}}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{asset('assets/lassets/css/style.css')}}">

</head>

<body>
        <div class="text-center">
            @include('flash-message')
        </div>
        @yield('content')


<!-- Required Js -->
<script src="{{asset('assets/lassets/js/vendor-all.min.js')}}"></script>
<script src="{{asset('assets/lassets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

</body>
</html>