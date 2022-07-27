<!DOCTYPE html>
<html lang="en">

@include("layout_dashboard.header")
<body>
@include("layout_dashboard.sidebar")
@include("layout_dashboard.topmenu")

<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <div class="main-body">
                    <div class="page-wrapper">
                        <div class="text-center">
                            @include('flash-message')
                        </div>
                        @yield("content")

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include("layout_dashboard.footer")


</body>
</html>
