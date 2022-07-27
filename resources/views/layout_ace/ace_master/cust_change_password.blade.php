@extends("layout_ace.main")
@section("title", "Account")

@section("content")

    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title" style="margin-left: 25%;">
                    <h3 style="font-weight: bold; width: 67%; text-align: center; border-bottom: 1px solid lightgrey; line-height: 0.1em; margin: 10px 0 20px; ">
                        <span style="background:#fff; padding:0 20px;">Change Password</span>
                    </h3>
                </div>
                <fieldset class="col2-set">
                    <legend>Change Password</legend>
                    <div class="col-2 registered-users" style="width: 60%; padding-right: 0; margin-left: 20%;">
                        <div class="content">
                            @if(Auth::check())

                                <form method="POST" id="signupForm" action="{{ url("/change/cust/pass" )}}">

                                    {{csrf_field()}}

                                <ul class="form-list">
                                    <li>
                                        <label for="pass">Old Password <span class="required">*</span></label>
                                        <br>
                                        <input type="password" id="o_pass" name="o_pass" class="input-text required-entry" title="old password" value="{{old('o_pass')}}" required>
                                        @if($errors->has("o_pass"))
                                            <div class="text-danger">
                                                {{$errors->first("o_pass")}}
                                            </div>
                                        @endif
                                    </li>
                                    <li>
                                        <label for="pass">New Password <span class="required">*</span></label>
                                        <br>
                                        <input type="password" id="new_password" name="new_password" class="input-text required-entry " title="new password" value="{{old('new_password')}}" required>
                                        @if($errors->has("new_password"))
                                            <div class="text-danger">
                                                {{$errors->first("new_password")}}
                                            </div>
                                        @endif
                                    </li>
                                    <li>
                                        <label for="pass">Confirm Password <span class="required">*</span></label>
                                        <br>
                                        <input type="password"  id="confirm_password" name="confirm_password"  class="input-text required-entry" title="confirm password" value="{{old('confirm_password')}}" required>

                                        @if($errors->has("confirm_password"))
                                            <div class="text-danger">
                                                {{$errors->first("confirm_password")}}
                                            </div>
                                        @endif
                                    </li>
                                </ul>
                                <div class="row">
                                    <div class="col-sm-5" style="margin-top: 9px">
                                        <button type="submit" class="button login" style="width: 120px; height: 40px;"><span>Update</span></button>
                                    </div>
                                </div>
                            </form>
                            @else
                                <div class="text-center">
                                    <h3 style="color: black">Please login first....</h3>
                                </div>
                            @endif
                        </div>
                    </div>
                </fieldset>
            </div><br><br><br><br><br>
        </div>
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

