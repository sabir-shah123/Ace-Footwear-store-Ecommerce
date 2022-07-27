@extends("layout_dashboard.main")
@section("title", "Show All Product")

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
                            <li class="breadcrumb-item  text-muted">Products</li>
                            <li class="breadcrumb-item  text-muted" aria-current="page">Product Image</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Show all Images</li>
                        </ol>
                    </nav>
                    {{--<ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{url('d_home')}}"><i class="feather icon-home"></i></a></li>
                        <li class="breadcrumb-item text-muted" style="color: black">Products</li>
                        <li class="breadcrumb-item text-muted" style="color: black">Product Details</li>
                        <li class="breadcrumb-item text-muted" style="color: black">Add Product</li>
                    </ul>--}}
                </div>
            </div>
        </div>
    </div>

    <!-- [ vertical-table ] start -->
    <div class="row">
        <div class="col-xl-12 col-md-12">
            <div class="card shadow-lg code-table pb-5">
                <div class="card-header bg-info" style="background-color: #3f4d67">
                    <h3 class="text-center text-white" style="font-weight: bold; margin-top: 4px;">All Product Records
                        <a href="/add/product/image" style="border: 1px solid white; border-radius: 10px; background-color: #006680;   font-size: 16px;color: white; padding: 5px; float: right">Add Products</a>

                    </h3>
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
                        <table id="zero-configuration" class="table table-striped table-styling table-columned">
                            <thead>
                            <tr class="table-styling">
                                <th>Sr#</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Update | Delete</th>
                            </tr>
                            </thead>

                            <tbody>


                            <?php $i = 1;  ?>

                            @if(count($allimages) > 0  && !empty($allimages))

                                @foreach($allimages as $allimage)
                                    <?php $ti = \App\Product::where("id", $allimage->product_id )->first()?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$ti->title}}</td>
                                        <td> <img src="{!! url('/images/products/'.$allimage->pimage) !!}" width="70px" height="70px"></td>
                                        {{--<td> {{$col->pcolor}}</td>--}}
                                        {{--<td> @foreach($siz as $si)<li>{{$si->psize}}</li>@endforeach</td>--}}
                                        <td>
                                            <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-success" title="Update Product" data-target="#update-product-{{$i}}"> <span class="fas fa-pencil-alt"></span></a>
                                            <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-danger" title="Delete Product" data-target="#delete-product-{{$i}}"> <span class="fas fa-trash-alt"></span></a>


                                        </td>
                                        {{--Model for Language Proficiency Help Start--}}
                                        <div id="update-product-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-product-{{$i}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="card-header bg-dark" style="text-align: center">
                                                        <h5 class="modal-title text-white" id="update-product-{{$i}}">Update "{{$ti->title}}" Record</h5>
                                                        <button type="button" class="close" style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <form method="post" action="{{url('/update/image')}}/{{$allimage->id}}"  enctype="multipart/form-data">
                                                        {{method_field('put')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <input class="form-control mt-5" type="file" name="pimage" accept="image/*" style="cursor: pointer;"  onchange="showMyImage(this)" required/>
                                                                <input type="hidden" name="hidden_file" value="{{$allimage->pimage}}" />
                                                                @if($errors->has("pimage"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("pimage")}}
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
                                        {{--Model for Language Proficiency Help End--}}
                                        {{--Model for Language Proficiency Help Start--}}
                                        <div id="delete-product-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-product-{{$i}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark" >
                                                        <h5 class="modal-title" style="margin-left: 160px; color: white;" id="delete-product-{{$i}}">Delete {{--{{$i}}:--}}  {{$ti->title}}</h5>
                                                        <button type="button"style="color: white" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <form method="post" action="{{url('/delete/image')}}/{{$allimage->id}}">
                                                        {{method_field('delete')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <p>Do you really want to remove this product from our system?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success shadow-3" >Yes, Delete it</button>
                                                            <button type="button" class="btn btn-danger shadow-3" data-dismiss="modal">No, Close</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        {{--Model for Language Proficiency Help End--}}



                                        <?php $i++;?>

                                    </tr>
                                    {{--@endforeach--}}

                                @endforeach


                            @else
                                <tr>
                                    <td colspan="13" class="text-danger text-center">No record found</td>
                                </tr>

                            @endif

                            </tbody>
                        </table>
                        {{--{{$allimages->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

