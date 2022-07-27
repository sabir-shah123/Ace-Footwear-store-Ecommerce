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
                                <form method="POST" action="{{ route('password.update') }}">
                                    @csrf

                                    <ul class="form-list">
                                        <li>
                                            <label for="email">Email Address <span class="required">*</span></label>
                                            <br>
                                            <input id="email" type="email" class="input-text @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </li>
                                        <li>
                                            <label for="email">New Password <span class="required">*</span></label>
                                            <br>
                                            <input id="password" type="password" class="input-text @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror

                                        </li>
                                        <li>
                                            <label for="email">Re-Type New Password <span class="required">*</span></label>
                                            <br>
                                            <input id="password-confirm" type="password" class="input-text" name="password_confirmation" required autocomplete="new-password">
                                        </li>
                                    </ul>

                                    <button type="submit" class="button login"><span>Change Password</span></button>

                                </form>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </section>




@endsection