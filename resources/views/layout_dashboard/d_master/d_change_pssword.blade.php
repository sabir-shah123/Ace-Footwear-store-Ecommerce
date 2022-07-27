@extends("layout_dashboard.main")
@section("title", "Change Password")

@section("content")

    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <div class="page-header-title">
                    </div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{url('d_home')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item text-muted">Admin</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Change Password</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center" style="margin-top: 4px;"><b>Change Password</b></h3>
        </div>
        <div class="card-body">
            @if(Auth::check())

                <form method="POST" id="signupForm" action="{{ url("/change/admin/pass" )}}">

                    {{csrf_field()}}

                <div class="form-group">

                    <div class="form-group">
                        <label>Old Password</label><br>
                        <input type="password" id="o_pass" placeholder="enter old password" name="o_pass" class="form-control" title="old password" value="{{old('o_pass')}}" required>
                        @if($errors->has("o_pass"))
                            <div class="text-danger">
                                {{$errors->first("o_pass")}}
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>New Password</label><br>
                        <input type="password" id="new_password" placeholder="enter new password" name="new_password" class="form-control" title="new password" value="{{old('new_password')}}" required>
                        @if($errors->has("new_password"))
                            <div class="text-danger">
                                {{$errors->first("new_password")}}
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group">
                        <label>Confirm Password</label><br>
                        <input type="password"  id="confirm_password" placeholder="confirm password" name="confirm_password"  class="form-control" title="confirm password" value="{{old('confirm_password')}}" required>

                        @if($errors->has("confirm_password"))
                            <div class="text-danger">
                                {{$errors->first("confirm_password")}}
                            </div>
                        @endif
                    </div><hr>
                    <button type="submit" class="btn btn-primary shadow-2 btn-lg mt-3" style="width: 30%; height: 60px; float: right;">Update</button>
                </div>
            </form>

            @else
                <div class="text-center">
                    <h3 style="color: black">Please login first....</h3>
                </div>
            @endif
        </div>
    </div>

    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.mask.min.js')}}"></script>
    <style>
        #signupForm label.error {
            margin-left: 10px;
            width: auto;
            color: red;
            display: inline-block;
        }
    </style>

    <script>

        $("#signupForm").validate({
            rules: {
                o_pass: {
                    required: true,
                    minlength: 6
                },
                new_password: {
                    required: true,
                    minlength: 6
                },
                confirm_password: {
                    required: true,
                    minlength: 6,
                    equalTo: "#new_password"
                },
            },
            messages: {
                o_pass: {
                    required: "Please provide a password",
                    minlength: "Your Old password must be at least 6 characters long"
                },
                new_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long",
                    equalTo: "Please enter the same password as above"
                },
            }
        });
    </script>
@endsection