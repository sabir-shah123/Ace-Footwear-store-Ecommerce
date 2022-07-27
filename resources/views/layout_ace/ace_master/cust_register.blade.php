@extends("layout_ace.main")
@section("title", "Signup")

@section("content")
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h2>Login or Create an Account</h2>
                </div>
                <fieldset class="col2-set">
                    <legend>Login or Create an Account</legend>
                    <div class="col-2 registered-users">
                        <strong>Register yourself</strong>
                        <div class="content">
                            <form method="POST" id="signupForm" action="{{ url("/customer/signup" )}}">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="form-list">
                                            <li class="form-group">
                                                <label for="email">Name <span class="required">*</span></label>
                                                <br>
                                                <input type="text" title="Name" name="name" class="input-text required-entry" value="{{old('name')}}"  required autofocus>

                                                @if($errors->has("name"))
                                                    <div class="text-danger">
                                                        {{$errors->first("name")}}
                                                    </div>
                                                @endif
                                            </li>
                                            <li>
                                                <label for="pass">Password <span class="required">*</span></label>
                                                <br>
                                                <input type="password" id="password" name="password" class="input-text required-entry @error('password') is-invalid @enderror" title="password" value="{{old('password')}}" required>
                                                @if($errors->has("password"))
                                                    <div class="text-danger">
                                                        {{$errors->first("password")}}
                                                    </div>
                                                @endif
                                            </li>

                                            <li>
                                                <label for="cell">Cell <span class="required">*</span></label>
                                                <br>
                                                <input type="text"  title="Enter valid cell no" id="cell" name="cell" class="input-text required-entry" value="{{old('cell')}}" required>
                                                <br>
                                                @if($errors->has("cell"))
                                                    <div class="text-danger">
                                                        {{$errors->first("cell")}}
                                                    </div>
                                                @endif
                                            </li>
                                            <li>
                                                <label for="pass">Address <span class="required">*</span></label>
                                                <br>
                                                <input type="text" name="address" class="input-text required-entry" title="enter your address here" value="{{old('address')}}" required>
                                                @if($errors->has("address"))
                                                    <div class="text-danger">
                                                        {{$errors->first("address")}}
                                                    </div>
                                                @endif
                                            </li>
                                            <li>
                                                <label for="pass">Postal Code <span class="required">*</span></label>
                                                <br>
                                                <input type="text" name="postal_code" id="postal_code" class="input-text required-entry" title="enter valid postal code" value="{{old('postal_code')}}" required>

                                                @if($errors->has("postal_code"))
                                                    <div class="text-danger">
                                                        {{$errors->first("postal_code")}}
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-6">
                                        <ul class="form-list">
                                            <li>
                                                <label for="pass">Username/Email<span class="required">*</span></label>
                                                <br>
                                                <input type="email" data-validation="email" title="Email" name="email" class="input-text required-entry" value="{{old('email')}}" required="required">
                                                @if($errors->has("email"))
                                                    <div class="text-danger">
                                                        {{$errors->first("email")}}
                                                    </div>
                                                @endif
                                            <li>
                                                <label for="pass">Confirm Password <span class="required">*</span></label>
                                                <br>
                                                <input type="password"  id="password-confirm" name="password_confirmation" class="input-text required-entry" title="confirm password" required>

                                                @if($errors->has("password_confirmation"))
                                                    <div class="text-danger">
                                                        {{$errors->first("password_confirmation")}}
                                                    </div>
                                                @endif
                                            </li>
                                            <li>
                                                <label for="pass">Country <span class="required">*</span></label>
                                                <br>
                                                <input type="text" name="country" class="input-text required-entry" title="enter country name" value="{{old('country')}}"  required>
                                                @if($errors->has("country"))
                                                    <div class="text-danger">
                                                        {{$errors->first("country")}}
                                                    </div>
                                                @endif
                                            </li>
                                            <li style="margin-top: 11px">
                                                <label for="city" >City <span class="required">*</span></label>
                                                <br>
                                                <input type="text" name="city" class="input-text required-entry" title="enter city name here" value="{{old('city')}}" required>

                                                @if($errors->has("city"))
                                                    <div class="text-danger">
                                                        {{$errors->first("city")}}
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                        <div class="buttons-set">
                                            <br><br><button class="btn btn-warning btn-lg shadow-2 mb-4" style="float: right; margin-right: 110px;">Sign up</button><br>
                                        <p class="mb-0 text-muted" style="font-size: 15px">Allready have an account? <a href="/customer/login"> Log in</a></p>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div><br><br><br><br><br>

    </section>

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
        $('#cell').mask("9999-9999999");
        $('#postal_code').mask("99999");

        $("#signupForm").validate({
            rules: {
                name: "required",

                postal_code: {
                    required: true,
                    minlength: 5
                },

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
                postal_code:"enter valid postal code",
            }
        });

    </script>

@endsection

