@extends("layout_ace.main")
@section("title", "Login")

@section("content")
<section class="main-container col1-layout">
    <div class="main container row">
        <div class="col-lg-4 col-xs-1"></div>
        <div class="col-lg-6 col-xs-10">
        <div class="account-login">
            <div class="page-title" style="margin-left: 25%;">
                <h3 style="font-weight: bold; width: 67%; text-align: center; border-bottom: 1px solid lightgrey; line-height: 0.1em; margin: 10px 0 20px; ">
                    <span style="background:#fff; padding:0 20px;">Login</span>
                </h3>
            </div>
            <fieldset class="col2-set">
                <legend>Login or Create an Account</legend>
                <div class="col-2 registered-users"><strong>Registered Customers</strong>
                    <div class="content">
                        <form id="signupForm" method="POST" action="{{ route('login11') }}">
                            @csrf
                            <p>If you have an account with us, please log in.</p>
                            <ul class="form-list">
                                <li>
                                    <label for="email">Email Address <span class="required">*</span></label>
                                    <br>
                                    <input type="text" title="Email Address" class="input-text required-entry" id="email" value="" name="email">
                                </li>
                                <li>
                                    <label for="pass">Password <span class="required">*</span></label>
                                    <br>
                                    <input type="password" title="Password" id="pass" class=" input-text required-entry validate-password" name="password">
                                </li>
                            </ul>

                            <div class="row">
                                <div class="col-lg-5 col-md-5" style="margin-top: 9px">
                                    <button type="submit" class="button login"><span>Login</span></button>
                                </div>
                            </div>
                            <p class="mb-0 text-muted" style="font-size: 12px; margin-top: 10px; margin-bottom: -15px"> Forgot password? <a href="{{ route('password.request') }}">Reset</a></p>

                        </form>
                </div>
                </div>
            </fieldset>
        </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
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


            password: {
                required: true,
            },
            email: {
                required: true,
                email: true
            },




        },
        messages: {

            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 6 characters long"
            },

            email: "Please enter a valid email address",


        }
    });


</script>










@endsection