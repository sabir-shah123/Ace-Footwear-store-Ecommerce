@extends("layout_dashboard.main")
@section("title", "Add Brand")

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
                            <li class="breadcrumb-item text-muted">Products</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Add Brand</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center"><b>Add Brand</b></h3>
        </div>
        <div class="card-body">

            <form method="post" action="{{url("/store-brand")}}"  enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Brand Name</label><br>
                    <input class="form-control" type="text" name="brand1" title="enter title" placeholder="enter brand name" value="{{old('brand')}}" required>

                    @if($errors->has("brand1"))
                        <div class="text-danger">
                            {{$errors->first("brand1")}}
                        </div>
                    @endif
                </div><hr>
                <div class="form-group">
                    <input class="form-control" type="file" name="image" accept="image/*" style="cursor: pointer;"  onchange="showMyImage(this)" required/>
                    @if($errors->has("image"))
                        <div class="text-danger">
                            {{$errors->first("image")}}
                        </div>
                    @endif
                    <br/>
                    <img class="ml-5" id="thumbnail" style="width:300px; height: 300px; margin-top:10px;"  src="" alt=""/>
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
                <button type="submit" class="btn btn-primary shadow-2" style="float: right; margin-top: -30px">Add Brand</button>
            </form><br><br><br><br>

            <hr>
            <h3 class="text-center"><b>All Brands</b></h3>
            <table class="table table-striped table-styling table-columned">
                <thead>
                <tr class="table-styling">
                    <th>Sr#</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Update |  Delete</th>
                </tr>
                </thead>

                <tbody>

                <?php $i = 1;
                $brand = \App\PBrand::paginate(15);
                ?>
                @if(count($brand) > 0  && !empty($brand))

                    @foreach($brand as $brands)

                        <tr>
                            <td>{{$i}}</td>
                            <td>
                                <a href="#" data-toggle="modal" title="Update Image" data-target="#update-image-{{$i}}">
                                    <img src="{!! url('/images/brands/'.$brands->image) !!}" width="120px" height="35px">
                                </a>
                            </td>
                            <td>{{$brands->brand}}</td>
                            <td>
                                <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-success" title="Update Product" data-target="#update-product-{{$i}}"> <span class="fas fa-pencil-alt"></span></a>
                                <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-danger" title="Delete Product" data-target="#delete-product-{{$i}}"> <span class="fas fa-trash-alt"></span></a>
                            </td>

                            <div id="update-image-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-image-{{$i}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="card-header bg-dark" style="text-align: center">
                                            <h5 class="modal-title text-white" id="update-image-{{$i}}">Update <b>"{{$brands->brand}}"</b> Record</h5>
                                            <button type="button" class="close"  style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>

                                        <form method="post" id="signupForm" action="{{url('/update/brand-image')}}/{{$brands->id}}" enctype="multipart/form-data">
                                            {{method_field('put')}}
                                            {{csrf_field()}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <input class="form-control mt-5" type="file" name="image" accept="image/*" style="cursor: pointer;"  onchange="showMyImage1(this)" required/>
                                                    <input type="hidden" name="hidden_file" value="{{$brands->image}}" />
                                                    @if($errors->has("image"))
                                                        <div class="text-danger">
                                                            {{$errors->first("image")}}
                                                        </div>
                                                    @endif
                                                    <br/>
                                                    <img class="ml-5" id="thumbnail" style="width:150px; height: 150px; margin-top:10px;"  src="" alt=""/>
                                                </div>
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



                            <div id="update-product-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-product-{{$i}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="card-header bg-dark" style="text-align: center">
                                            <h5 class="modal-title text-white" id="update-product-{{$i}}">Update <b>"{{$brands->brand}}"</b> Name</h5>
                                            <button type="button" class="close"  style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>

                                        <form method="post" action="{{url('/update/brand')}}/{{$brands->id}}">
                                            {{method_field('put')}}
                                            {{csrf_field()}}
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Product Title/Name</label>
                                                    <input class="form-control" type="text" name="brand" title="enter new name" value="{{$brands->brand}}" required autofocus>
                                                    @if($errors->has("brand"))
                                                        <div class="text-danger">
                                                            {{$errors->first("brand")}}
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

                            <div id="delete-product-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-product-{{$i}}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="card-header bg-dark" style="text-align: center">
                                            <h5 class="modal-title text-white" id="delete-product-{{$i}}">Delete <b>"{{$brands->brand}}"</b></h5>
                                            <button type="button"style="color: white" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                        </div>

                                        <form method="post" action="{{url('/delete/brand/')}}/{{$brands->id}}">
                                            {{method_field('delete')}}
                                            {{csrf_field()}}
                                            <div class="modal-body">
                                                <p>Do you really want to remove this product from our system?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success shadow-3" ><i class="feather icon-trash-2"></i>Yes, Delete it</button>
                                                <button type="button" class="btn btn-danger shadow-3" data-dismiss="modal">No, Close</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <?php $i++;?>

                        </tr>
                    @endforeach

                @else
                    <tr>
                        <td colspan="13" class="text-danger text-center">No record found</td>
                    </tr>

                @endif

                </tbody>
            </table>
        </div>
    </div>

@endsection