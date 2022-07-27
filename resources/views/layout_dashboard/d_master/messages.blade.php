
@extends("layout_dashboard.main")
@section("title", "Messages")

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
                            <li class="breadcrumb-item text-muted active" aria-current="page">Messages</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- [ vertical-table ] start -->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card shadow-lg code-table pb-5">
                <div class="card-header bg-info" style="background-color: #3f4d67">
                    <h3 class="text-center text-white" style="font-weight: bold; margin-top: 4px;">All Messages</h3>
                    <div class="card-header-right">
                        <div class="btn-group card-option">

                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                            </ul>

                        </div>
                    </div>
                </div>
                <div class="card-block pb-0">
                    <div class="table-responsive">
                        <table id="key-act-button2" class="table table-striped table-styling table-columned">
                            <thead class="text-center">
                            <tr class="table-styling">
                                <th>#</th>
                                <th>Name</th>
                                <th data-breakpoints="xs">Email</th>
                                <th data-breakpoints="xs">Subject</th>
                                <th data-breakpoints="xs">Message</th>
                                <th data-breakpoints="xs">Action</th>

                            </tr>
                            </thead>

                            <tbody>
                            <?php
                            $message = \App\Contactus::orderBy('created_at','desc')->get();
                            ?>

                            @if(count($message) > 0  && !empty($message))

                                @foreach($message as $messages)
                                    <tr>
                                        <td>{{$messages->id}}</td>
                                        <td>{{$messages->name}}</td>
                                        <td>{{$messages->email}}</td>
                                        <td>{{$messages->subject}}</td>
                                        <td ><p style="text-align: left; width: 400px; white-space: pre-line;">{{$messages->message}}</p></td>
                                        <td>
                                            <a href="#" data-toggle="modal" title="Update Product" data-target="#update-product-{{$messages->id}}"> <span class="fas fa-reply"></span> Reply</a>
                                        </td>


                                        {{--Model for Language Proficiency Help Start--}}
                                        <div id="update-product-{{$messages->id}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-product-{{$messages->id}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="card-header bg-dark" style="text-align: center">
                                                        <h5 class="modal-title text-white" id="update-product-{{$messages->id}}">Reply to <b>"{{$messages->name}}"</b></h5>
                                                        <button type="button" class="close"  style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <form method="post" action="{{url('laravel-send-email/'.$messages->id)}}">
                                                        @csrf
                                                        {{--{{method_field('put')}}
                                                        {{csrf_field()}}--}}
                                                        <div class="modal-body">
                                                            {{--<div class="form-group">
                                                                <label>Product Title/Name</label>
                                                                <input class="form-control" type="text" name="title" title="enter title" value="{{$allproduct->title}}" required>
                                                                @if($errors->has("title"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("title")}}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <hr>--}}

                                                            <div class="form-group">
                                                                    <label>Email</label><br>
                                                                <input class="form-control" type="email" name="email" value="{{$messages->email}}" readonly>
                                                                    @if($errors->has("email"))
                                                                        <div class="text-danger">
                                                                            {{$errors->first("email")}}
                                                                        </div>
                                                                    @endif
                                                            </div><hr>
                                                            <div class="form-group">
                                                                <label>Subject</label><br>
                                                                <input class="form-control" type="text" name="subject" value="{{$messages->subject}}" readonly>
                                                                @if($errors->has("subject"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("subject")}}
                                                                    </div>
                                                                @endif
                                                            </div><hr>
                                                            <div class="form-group">
                                                                <label>Message</label><br>
                                                                <textarea maxlength="500" id="textbox" onkeyup="charcountupdate(this.value)" type="text" name="message" class="col-sm-12 col-lg-12 col-xs-12" style="background-color:white;" rows="4" required></textarea>
                                                                <span id=charcount ></span>
                                                                @if($errors->has("message"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("message")}}
                                                                    </div>
                                                                @endif
                                                            </div><hr>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success shadow-3" >Send Reply</button>
                                                            <button type="button" class="btn btn-secondary shadow-3" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>

                                        {{--Model for Language Proficiency Help End--}}






                                    </tr>
                                @endforeach


                            @else
                                <tr>
                                    <td colspan="13" class="text-danger text-center">No record found</td>
                                </tr>

                            @endif

                            </tbody>
                        </table>
                        {{--<script>
                            function charcountupdate(str) {
                                var lng = str.length;
                                document.getElementById("charcount").innerHTML = lng + ' / 500 characters';
                            }
                        </script>--}}
                        {{--{{$message->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>






@endsection

