@extends("layout_ace.main")
@section("title", "Reset")

@section("content")
    <div class="text-center">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif
    </div>
    <section class="main-container col1-layout">
        <div class="main container row">
            <div class="col-lg-4 col-xs-1"></div>
            <div class="col-lg-6 col-xs-10">
                <div class="account-login">
                    <div class="page-title" style="margin-left: 25%;">
                        <h3 style="font-weight: bold; width: 67%; text-align: center; border-bottom: 1px solid lightgrey; line-height: 0.1em; margin: 10px 0 20px; ">
                            <span style="background:#fff; padding:0 20px;">Reset</span>
                        </h3>
                    </div>
                    <fieldset class="col2-set">
                        <legend>Reset Password</legend>
                        <div class="col-2 registered-users"><strong>Reset Password</strong>
                            <div class="content">
                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf
                                    <ul class="form-list">
                                        <li>
                                            <label for="email">Email Address <span class="required">*</span></label>
                                            <br>
                                            <input id="email" name="email" type="email" class="input-text @error('email') is-invalid @enderror" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                            @enderror

                                        </li>
                                    </ul>

                                    <button type="submit" class="button login"><span>Reset</span></button>

                                </form>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
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