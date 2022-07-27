@extends("layout_dashboard.main")
@section("title", "Newsletter")

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
                            <li class="breadcrumb-item text-muted active" aria-current="page">Send Newsletter</li>
                        </ol>
                    </nav>
                    {{--<ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('d_home')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item text-muted" style="color: black">Add Product Color</li>
                    </ul>--}}
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center" style="margin-top: 4px;"><b>Send Newsletters</b>
            </h3>
        </div>
        <div class="card-body">

            <form method="post" action="{{url("/laravel-send-newsletter")}}">
                {{method_field('post')}}
                {{csrf_field()}}

                <div class="form-group">
                            <div class="form-group">
                                <label>Subject</label><br>
                                <input class="form-control" type="text" name="subject" title="enter title" placeholder="enter subject here" required>


                            @if($errors->has("subject"))
                                    <div class="text-danger">
                                        {{$errors->first("subject")}}
                                    </div>
                                @endif
                            </div><hr>
                    <div class="form-group">
                        <textarea maxlength="500" id="textbox" onkeyup="charcountupdate(this.value)" type="text" name="message" class="col-sm-12 col-lg-12 col-xs-12 form-control" style="background-color:white;" rows="4" required></textarea>
                        <span id="charcount" style=""></span>
                        @if($errors->has("message"))
                            <div class="text-danger">
                                {{$errors->first("message")}}
                            </div>
                        @endif
                    </div><hr>

                    <button type="submit" class="btn btn-primary shadow-2 btn-lg mt-5" style="width: 20%; height: 60px; float: right;">Send</button>


                </div>
            </form>
        </div>
    </div>

    <script>
        function charcountupdate(str) {
            var lng = str.length;
            document.getElementById("charcount").innerHTML = lng + ' / 500 characters';
        }
    </script>


@endsection