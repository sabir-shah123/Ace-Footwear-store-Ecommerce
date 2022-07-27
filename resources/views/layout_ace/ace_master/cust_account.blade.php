@extends("layout_ace.main")
@section("title", "Account")

@section("content")
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h3 style="font-weight: bold; width: 67%; text-align: center; border-bottom: 1px solid lightgrey; line-height: 0.1em; margin-left: 16%; ">
                        <span style="background:#fff; padding:0 20px;">Edit Account details</span>
                    </h3>
                </div>
                <fieldset class="col2-set">
                    <legend>Edit Account details</legend>

                    <div class="col-2 registered-users">
                        <div class="content">
                            @if(Auth::check())

                            <form method="POST" id="signupForm" action="{{ url("/customer/accUpdate" )}}/{{Auth::user()->id}}">
                                {{method_field('put')}}
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="form-list">
                                            <li class="form-group">
                                                <label for="email">Name <span class="required">*</span></label>
                                                <br>
                                                <input type="text" title="Name" name="name" class="input-text required-entry" value="{{Auth::user()->name}}"  required autofocus>

                                                @if($errors->has("name"))
                                                    <div class="text-danger">
                                                        {{$errors->first("name")}}
                                                    </div>
                                                @endif

                                            </li>
                                            <li>
                                                <label for="cell">Cell <span class="required">*</span></label>
                                                <br>
                                                <input type="text"  title="Enter valid cell no" id="cell" name="cell" class="input-text required-entry" value="{{Auth::user()->cell}}" required>
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
                                                <input type="text" name="address" class="input-text required-entry" title="enter your address here" value="{{Auth::user()->address}}" required>
                                                @if($errors->has("address"))
                                                    <div class="text-danger">
                                                        {{$errors->first("address")}}
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-sm-6">
                                        <ul class="form-list">
                                            <li>
                                                <label for="pass">Country <span class="required">*</span></label>
                                                <br>
                                                <input type="text" name="country" onKeyPress="return ValidateAlpha(event);" class="input-text required-entry" title="enter country name" value="{{Auth::user()->country}}"  required>
                                                @if($errors->has("country"))
                                                    <div class="text-danger">
                                                        {{$errors->first("country")}}
                                                    </div>
                                                @endif
                                            </li>
                                            <li style="margin-top: 11px">
                                                <label for="city" >City <span class="required">*</span></label>
                                                <br>
                                                <input type="text" name="city" onKeyPress="return ValidateAlpha(event);" class="input-text required-entry" title="enter city name here" value="{{Auth::user()->city}}" required>

                                                @if($errors->has("city"))
                                                    <div class="text-danger">
                                                        {{$errors->first("city")}}
                                                    </div>
                                                @endif
                                            </li>
                                            <li>
                                                <label for="pass">Postal Code <span class="required">*</span></label>
                                                <br>
                                                <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="postal_code" id="postal_code" class="input-text required-entry" title="enter valid postal code" value="{{Auth::user()->postal_code}}" required>

                                                @if($errors->has("postal_code"))
                                                    <div class="text-danger">
                                                        {{$errors->first("postal_code")}}
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                        <div class="buttons-set">
                                            <br><br><button class="btn btn-warning btn-lg shadow-2 mb-4" style="float: right; margin-right: 110px;">Update</button><br>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            @else
                                <div class="text-center">
                                    Please login first....
                                </div>
                            @endif
                        </div>
                    </div>
                </fieldset>
            </div>
        </div><br><br><br><br><br>
    </section>

<script>
    function ValidateAlpha(evt)
    {
        var keyCode = (evt.which) ? evt.which : evt.keyCode
        if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)

            return false;
        return true;
    }
</script>

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
            }
        });
    </script>

@endsection

