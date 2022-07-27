@extends("layout_ace.main")
@section("title", "Contact us")

@section("content")
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ul>
                    <li class="home"> <a title="Go to Home Page" href="/home">Home</a><span>&mdash;›</span></li>
                    <li class="category13"><strong>Contact Us</strong></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title" style="margin-left: 25%;">
                    <h2 style=" width: 67%; text-align: center; border-bottom: 1px solid lightgrey; line-height: 0.1em; margin: 10px 0 20px; ">
                        <span style="background:#fff; padding:0 20px;">Get in Touch</span>
                    </h2>
                </div>
                <fieldset class="col2-set">
                    <div class="col-2 registered-users" style="width: 60%; padding-right: 0; margin-left: 20%;">
                        <div class="content">
                            <form method="post" action="{{url("/contactus")}}">
                                @csrf
                                <ul class="form-list">
                                    <li>
                                        <label> Name <span class="required">*</span></label>
                                        <br>
                                        <input type="text" title="Enter Name" class="input-text required-entry" name="name" required autofocus>
                                    </li>

                                    <li>
                                        <label> Email <span class="required">*</span></label>
                                        <br>
                                        <input type="email" name="email" title="Enter Valid Email Address" pattern="([0-9a-zA-Z/-/_/.]{1,})@([a-zA-Z]{1,}).([a-zA-Z]{1,})" class="input-text required-entry" required>
                                    </li>

                                    <li>
                                        <label> Subject <span class="required">*</span></label>
                                        <br>
                                        <input type="text" name="subject" title="subject" class=" input-text required-entry" required>
                                    </li>

                                    <li>
                                        <label> Message <span class="required">*</span></label>
                                        <br>
                                        <textarea maxlength="500" id="textbox" onkeyup="charcountupdate(this.value)" type="text" name="message" class="col-sm-9 col-lg-9 col-xs-9" style="background-color:white;" rows="4" required></textarea>
                                        <span id=charcount style="float: right ; margin-right: 25%;"></span>
                                    </li>

                                </ul>
                                <br><br><br><br><br><br><button type="submit" class="button" style="background-color: dodgerblue; color: white; width: 110px; height: 40px"><span>Submit</span></button>
                            </form>
                        </div>
                    </div>
                </fieldset>
            </div>
            <br>
            <br>
        </div>
    </section>

    <script>
        function charcountupdate(str) {
            var lng = str.length;
            document.getElementById("charcount").innerHTML = lng + ' / 500 characters';
        }
    </script>

@endsection