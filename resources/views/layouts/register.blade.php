<!DOCTYPE html>
<html lang="en">

<head>
    <title>Signup</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template"/>
    <meta name="author" content="CodedThemes"/>

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
