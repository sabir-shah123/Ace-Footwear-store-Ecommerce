@extends("layout_dashboard.main")
@section("title", "Account")

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
                            <li class="breadcrumb-item  text-muted">Admin</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Show</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card shadow-lg code-table pb-5">
                <div class="card-header bg-info" style="background-color: #3f4d67">
                    <h3 class="text-center text-white" style="font-weight: bold; margin-top: 4px;">Admin Record</h3>
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
                        <table  class="table table-striped table-styling table-columned">
                            <thead>
                            <tr class="table-styling">
                                <th>Sr#</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Cell</th>
                                <th>Address</th>
                                <th>CNIC</th>
                                <th>Update</th>
                            </tr>
                            </thead>

                            <tbody>

                            <?php $i = 1;  ?>
                            @if(Auth::check())
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" title="Update Image" data-target="#update-image-{{$i}}">
                                                <img src="{!! url('/images/admin/'. Auth::user()->uphoto) !!}" width="70px" height="70px">
                                            </a>
                                        </td>
                                        <td>{{Auth::user()->name}}</td>
                                        <td>{{Auth::user()->gender}}</td>
                                        <td>{{Auth::user()->cell}}</td>
                                        <td>{{Auth::user()->address}}</td>
                                        <td>{{Auth::user()->cnic}}</td>
                                        <td>
                                            <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-success" title="Update Admin" data-target="#update-admin-{{$i}}"> <span class="fas fa-pencil-alt"></span></a>
                                        </td>


                                        <div id="update-image-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-image-{{$i}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="card-header bg-dark" style="text-align: center">
                                                        <h5 class="modal-title text-white" id="update-image-{{$i}}">Update <b>"{{Auth::user()->name}}"</b> Record</h5>
                                                        <button type="button" class="close"  style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <form method="post" id="signupForm" action="{{url('update/admin/image')}}/{{Auth::user()->id}}" enctype="multipart/form-data">
                                                            {{method_field('put')}}
                                                            {{csrf_field()}}
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input class="form-control mt-5" type="file" name="photo" id="photo" accept="image/*" style="cursor: pointer;"  onchange="showMyImage(this)" required>
                                                                    <input type="hidden" name="hidden_file" value="{{Auth::user()->uphoto}}" />
                                                                    @if($errors->has("photo"))
                                                                        <div class="text-danger">
                                                                            {{$errors->first("photo")}}
                                                                        </div>
                                                                    @endif
                                                                    <br/>
                                                                    <img class="ml-5" id="thumbnail" style="width:150px; height: 150px; margin-top:10px;"  src="" alt=""/>
                                                                </div>
                                                                <script>
                                                                    function showMyImage(fileInput) {
                                                                        var files = fileInput.files;
                                                                        for (var i = 0; i < files.length; i++) {
                                                                            var file = files[i];
                                                                            var imageType = /image.*/;
                                                                            if (!file.type.match(imageType)) {
                                                                                continue;
                                                                            }
                                                                            var img=document.getElementById("thumbnail");
                                                                            img.file = file;
                                                                            var reader = new FileReader();
                                                                            reader.onload = (function(aImg) {
                                                                                return function(e) {
                                                                                    aImg.src = e.target.result;
                                                                                };
                                                                            })(img);
                                                                            reader.readAsDataURL(file);
                                                                        }
                                                                    }
                                                                </script>
                                                                <hr>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit" class="btn btn-success shadow-3" >Update</button>
                                                                <button type="button" class="btn btn-secondary shadow-3" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>

                                                </div>
                                            </div>
                                        </div>




                                        <div id="update-admin-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-admin-{{$i}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="card-header bg-dark" style="text-align: center">
                                                        <h5 class="modal-title text-white" id="update-admin-{{$i}}">Update <b>"{{Auth::user()->name}}"</b> Record</h5>
                                                        <button type="button" class="close"  style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <form method="post" id="signupForm" action="{{url('update/admin')}}/{{Auth::user()->id}}">
                                                        {{method_field('put')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label>Name</label>
                                                                <input class="form-control" type="text" name="name" title="enter title" value="{{Auth::user()->name}}" required>
                                                                @if($errors->has("name"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("name")}}
                                                                    </div>
                                                                @endif
                                                            </div>
                                                            <hr>

                                                            <div class="form-group">


                                                                <label>Cell</label><br>
                                                                <input type="text" id="cell" minlength="12" name="cell" class="form-control" value="{{Auth::user()->cell}}" placeholder="phone number" value="{{old('cell')}}" required>

                                                                @if($errors->has("cell"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("cell")}}
                                                                    </div>
                                                                @endif

                                                            </div><hr>

                                                            <div class="form-group">
                                                                <label>CNIC</label><br>
                                                                <input type="text" id="cnic" minlength="15" name="cnic" class="form-control" placeholder="enter your CNIC" value="{{Auth::user()->cnic}}"  required/>

                                                                @if($errors->has("cnic"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("cnic")}}
                                                                    </div>
                                                                @endif

                                                            </div><hr>

                                                            <div class="form-group">
                                                                <label>Address</label><br>
                                                                <input type="text" name="address" class="form-control" placeholder="enter your address here" value="{{Auth::user()->address}}" required>

                                                                @if($errors->has("address"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("address")}}
                                                                    </div>
                                                                @endif
                                                            </div><hr>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success shadow-3" >Update</button>
                                                            <button type="button" class="btn btn-secondary shadow-3" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>



                                        <?php $i++;?>

                                    </tr>

                            @else
                                <tr>
                                    <td colspan="13" class="text-danger text-center">No record found</td>
                                </tr>

                            @endif

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{asset('assets/dassets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/dassets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/dassets/js/jquery.mask.min.js')}}"></script>
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
        $('#cnic').mask("99999-9999999-9");

        $("#signupForm").validate({
            rules: {
                name: "required",
                cell: {
                    required: true,
                    minlength: 12,
                },
                cnic: {
                    required: true,
                    minlength: 15,
                },
            },
            messages: {
                name: "Please enter your Full name",

                cell: "Please enter 11 digit phone no#",
                cnic: "Please enter 13 digit cnic no#",
            }
        });

        $('#cnic').keydown(function(){

            //allow  backspace, tab, ctrl+A, escape, carriage return
            if (event.keyCode == 8 || event.keyCode == 9
                || event.keyCode == 27 || event.keyCode == 13
                || (event.keyCode == 65 && event.ctrlKey === true) )
                return;
            if((event.keyCode < 48 || event.keyCode > 57))
                event.preventDefault();

            var length = $(this).val().length;

            if(length == 5 || length == 13)
                $(this).val($(this).val()+'-');
        });

    </script>
@endsection