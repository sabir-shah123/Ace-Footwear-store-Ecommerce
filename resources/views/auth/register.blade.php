@extends('layouts.register')

@section('content')
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card" style="">
                <form method="POST" id="signupForm" action="{{ url('/admin/register') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4 mt-4 text-center">
                        <i class="feather icon-user-plus auth-icon"></i>
                    </div>
                    <h3 class="mb-4 text-center">Admin Sign up</h3>


                    <div class="card-body text-center">
                        <div class="form-group mb-3">
                            <select class="selectpicker form-control" id="role" name="role" style="cursor: pointer;" required autofocus>
                                <option selected>Admin</option>
                            </select>

                            @if($errors->has("role"))
                                <div class="text-danger">
                                    {{$errors->first("role")}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <input type="text" name="name" class="form-control" placeholder="enetr your name" value="{{old('name')}}"  required>
                            @if($errors->has("name"))
                                <div class="text-danger">
                                    {{$errors->first("name")}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email or username" value="{{old('email')}}" required>

                        </div>
                        <div class="mb-3 text-left">
                            @if($errors->has("email"))
                                <div class="text-danger">
                                    {{$errors->first("email")}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group mb-4">
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="password" value="{{old('password')}}" required>
                            @if($errors->has("password"))
                                <div class="text-danger">
                                    {{$errors->first("password")}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group mb-1">
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" placeholder="confirm password" required>

                            @if($errors->has("password_confirmation"))
                                <div class="text-danger">
                                    {{$errors->first("password_confirmation")}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group mb-3">
                            <label></label>
                            <select class="selectpicker form-control" name="gender" style="cursor: pointer;" value="{{old('gender')}}" required>
                                <option selected disabled>-- select gender --</option>
                                <option>Male</option>
                                <option>Female</option>
                            </select>

                            @if($errors->has("gender"))
                                <div class="text-danger">
                                    {{$errors->first("gender")}}
                                </div>
                            @endif
                        </div>


                        <div class="form-group mb-3">
                            <input type="text" id="cell" name="cell" class="form-control" placeholder="phone number" value="{{old('cell')}}" required>

                            @if($errors->has("cell"))
                                <div class="text-danger">
                                    {{$errors->first("cell")}}
                                </div>
                            @endif

                        </div>

                        {{--<div class="form-group mb-3">
                            <input type="text" name="country" class="form-control" placeholder="enter your country here" value="{{old('country')}}" required>

                            @if($errors->has("country"))
                                <div class="text-danger">
                                    {{$errors->first("country")}}
                                </div>
                            @endif

                        </div>--}}

                        <div class="form-group mb-3">
                            <input type="text" name="address" class="form-control" placeholder="enter your address here" value="{{old('address')}}" required>

                            @if($errors->has("address"))
                                <div class="text-danger">
                                    {{$errors->first("address")}}
                                </div>
                            @endif

                        </div>
                        {{--<div class="form-group mb-3">
                            <input type="text" name="city" class="form-control" placeholder="enter city name here" value="{{old('city')}}" required>

                            @if($errors->has("city"))
                                <div class="text-danger">
                                    {{$errors->first("city")}}
                                </div>
                            @endif

                        </div>--}}

                        {{--<div class="form-group mb-3">
                            <input type="text" name="postal_code" class="form-control" placeholder="enter postal code here" value="{{old('postal_code')}}" required>

                            @if($errors->has("postal_code"))
                                <div class="text-danger">
                                    {{$errors->first("postal_code")}}
                                </div>
                            @endif

                        </div>--}}

                        {{--<div class="form-group mb-3">
                            <select class="selectpicker form-control" name="role" style="cursor: pointer;" value="{{old('role')}}" required>
                                <option selected disabled>-- select role --</option>
                                <option value="1">User</option>
                                <option value="2">Admin</option>
                            </select>

                            @if($errors->has("role"))
                                <div class="text-danger">
                                    {{$errors->first("role")}}
                                </div>
                            @endif
                        </div>--}}

                        <div class="form-group mb-3">
                            <input type="text" id="cnic" name="cnic" class="form-control" placeholder="enter your CNIC" value="{{old('cnic')}}"  required/>

                            @if($errors->has("cnic"))
                                <div class="text-danger">
                                    {{$errors->first("cnic")}}
                                </div>
                            @endif

                        </div>
                        <div class="form-group mb-3">
                            <input type="file" id="uphoto" name="uphoto" class="form-control" value="{{old('uphoto')}}"  required/>

                            @if($errors->has("uphoto"))
                                <div class="text-danger">
                                    {{$errors->first("uphoto")}}
                                </div>
                            @endif

                        </div>
                        {{--<div class="form-group text-left">
                            <div class="checkbox checkbox-fill d-inline">
                                <input type="checkbox" checked="" name="remember" id="checkbox-fill-a1" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-fill-a1" class="cr"> Save Credentials</label>
                             </div>
                        </div>--}}
                        {{--<div class="form-group text-left">
                            <div class="checkbox checkbox-fill d-inline">
                                <input type="checkbox" name="newsletter" id="checkbox-fill-2">
                                <label for="checkbox-fill-2" class="cr">Send me the <a href="#!"> Newsletter</a> weekly.</label>
                            </div>
                        </div>--}}

                            <button class="btn btn-primary shadow-2 mb-4">Sign up</button><br>
                            <p class="mb-0 text-muted">Allready have an account? <a href="{{url('/admin/login')}}"> Log in</a></p>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{asset('lassets/js/jquery.min.js')}}"></script>
    {{--<script type="text/javascript" src="{{asset('dassets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('dassets/js/parallax.js')}}"></script>
    <script type="text/javascript" src="{{asset('dassets/js/common.js')}}"></script>
    <script type="text/javascript" src="{{asset('dassets/js/revslider.js')}}"></script>
    <script type="text/javascript" src="{{asset('dassets/js/owl.carousel.min.js')}}"></script>--}}
    <script type="text/javascript" src="{{asset('lassets/js/jquery.validate.min.js')}}"></script>
    <style>
        #signupForm label.error {
            margin-left: 10px;
            width: auto;
            color: red;
            display: inline-block;
        }

    </style>
    <script type="text/javascript" src="{{asset('lassets/js/jquery.mask.min.js')}}"></script>

    <script>
        $('#cell').mask("9999-9999999");
        $('#cnic').mask("99999-9999999-9");

        $("#signupForm").validate({
            rules: {
                role: "required",
                name: "required",


                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                cell: {
                    required: true,
                    minlength: 12,
                },
                cnic: {
                    required: true,
                    minlength: 15,
                },
                uphoto: {
                    required: true,
                },



            },
            messages: {
                name: "Please enter your Full name",

                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                password_confirmation: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: "Please enter a valid email address",
                cell: "Please enter 11 digit phone no#",
                cnic: "Please enter 13 digit cnic no#",

            }
        });


    </script>




@endsection
