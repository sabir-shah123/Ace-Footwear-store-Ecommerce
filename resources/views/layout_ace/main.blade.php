<!DOCTYPE html>
<html lang="en">
@include("layout_ace.header")
<body>
@include("layout_ace.topmenu")
        <div class="text-center">
            @include('flash-message')
        </div>
        @yield("content")
@include("layout_ace.footer")
@yield("extrascript")
</body>
</html>