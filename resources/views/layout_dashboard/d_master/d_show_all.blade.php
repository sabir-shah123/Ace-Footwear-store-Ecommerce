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
                            <li class="breadcrumb-item  text-muted" aria-current="page">Product Details</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Show all Products</li>
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
                    <h3 class="text-center text-white" style="font-weight: bold; margin-top: 4px;">All Product Records
                        <a href="/add/product" style="border: 1px solid white; border-radius: 10px; background-color: #006680;   font-size: 16px;color: white; padding: 5px; float: right">Add Products</a>

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
                    <table id="key-act-button1" class="table table-striped table-styling table-columned">
                        <thead>
                            <tr class="table-styling">
                                <th>Sr#</th>
                                <th>Title</th>
                                <th>Catalog</th>
                                <th>Category</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Update | Delete</th>
                            </tr>
                        </thead>

                        <tbody>


                        <?php $i = 1;  ?>

                        @if(count($allproducts) > 0  && !empty($allproducts))

                            @foreach($allproducts as $allproduct)

                                     <tr>
                                    <td>{{$i}}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" title="Update Title" data-target="#update-title-{{$i}}">
                                            <b style="color: black">{{$allproduct->title}}</b>
                                        </a>

                                    </td>
                                    <td>{{$allproduct->catalog}}</td>
                                    <td>{{$allproduct->category}}</td>
                                     <td>{{$allproduct->brand}}</td>
                                     {{--<td> {{$col->pcolor}}</td>--}}
                                    {{--<td> @foreach($siz as $si)<li>{{$si->psize}}</li>@endforeach</td>--}}
                                    <td>{{$allproduct->price}}</td>
                                    <td>
                                        <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-success" title="Update Product" data-target="#update-product-{{$i}}"> <span class="fas fa-pencil-alt"></span></a>
                                        <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-danger" title="Delete Product" data-target="#delete-product-{{$i}}"> <span class="fas fa-trash-alt"></span></a>
                                    </td>

                                         <div id="update-title-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-title-{{$i}}" aria-hidden="true">
                                             <div class="modal-dialog" role="document">
                                                 <div class="modal-content">
                                                     <div class="card-header bg-dark" style="text-align: center">
                                                         <h5 class="modal-title text-white" id="update-title-{{$i}}">Update <b>"{{$allproduct->title}}"</b> Name</h5>
                                                         <button type="button" class="close"  style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                     </div>

                                                     <form method="post" action="{{url('update/product/title')}}/{{$allproduct->id}}">
                                                         {{method_field('put')}}
                                                         {{csrf_field()}}
                                                         <div class="modal-body">
                                                             <div class="form-group">
                                                                 <label>Product Title/Name</label>
                                                                 <input class="form-control" type="text" name="title" title="enter title" value="{{$allproduct->title}}" required>
                                                                 @if($errors->has("title"))
                                                                     <div class="text-danger">
                                                                         {{$errors->first("title")}}
                                                                     </div>
                                                                 @endif
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
                                                         <h5 class="modal-title text-white" id="update-product-{{$i}}">Update <b>"{{$allproduct->title}}"</b> Record</h5>
                                                         <button type="button" class="close"  style="color: white;" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                     </div>

                                                     <form method="post" action="{{url('update/product')}}/{{$allproduct->id}}">
                                                         {{method_field('put')}}
                                                         {{csrf_field()}}
                                                         <div class="modal-body">

                                                             <div class="row form-group">

                                                                 <div class="col-sm-4">
                                                                     <label>Catalog</label><br>
                                                                     <select class="form-control" name="catalog" style="cursor: pointer;" required>
                                                                         <option selected>{{$allproduct->catalog}}</option>
                                                                         <option >Men</option>
                                                                         <option>Women</option>
                                                                         <option>Kids</option>
                                                                     </select>

                                                                     @if($errors->has("catalog"))
                                                                         <div class="text-danger">
                                                                             {{$errors->first("catalog")}}
                                                                         </div>
                                                                     @endif
                                                                 </div>
                                                                 <div class="col-sm-4">
                                                                     <label>Product Category</label><br>
                                                                     <select class="selectpicker form-control" name="category" style="cursor: pointer;" required>
                                                                         <option selected>{{$allproduct->category}}</option>
                                                                         <optgroup label="Men">
                                                                             <option>Casual</option>
                                                                             <option>Formal</option>
                                                                             <option>Sandals</option>
                                                                             <option>Peshawri</option>
                                                                             <option>Sports</option>
                                                                         </optgroup>
                                                                         <optgroup label="Woman">
                                                                             <option>Casual</option>
                                                                             <option>Formal</option>
                                                                             <option>Heels</option>
                                                                             <option>Sports</option>
                                                                         </optgroup>
                                                                         <optgroup label="Kids">
                                                                             <option>Boys</option>
                                                                             <option>Girls</option>
                                                                         </optgroup>
                                                                     </select>

                                                                     @if($errors->has("category"))
                                                                         <div class="text-danger">
                                                                             {{$errors->first("category")}}
                                                                         </div>
                                                                     @endif

                                                                 </div>
                                                                 <div class="col-sm-4">
                                                                     <?php $brand = \App\PBrand::all(); ?>
                                                                     <label>Brand</label><br>
                                                                     <select class="selectpicker form-control" name="brand" style="cursor: pointer;" value="{{old('brand')}}" required>
                                                                         <option selected>{{$allproduct->brand}}</option>
                                                                         @foreach ($brand as $brands)
                                                                             <option>{{$brands->brand}}</option>
                                                                         @endforeach
                                                                     </select>

                                                                     @if($errors->has("brand"))
                                                                         <div class="text-danger">
                                                                             {{$errors->first("brand")}}
                                                                         </div>
                                                                     @endif
                                                                 </div>
                                                             </div><hr>

                                                             <div class="form-group">
                                                                 <label>Price</label>
                                                                 <input class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="price" placeholder="enter product price here" value="{{$allproduct->price}}" required>
                                                                 @if($errors->has("price"))
                                                                     <div class="text-danger">
                                                                         {{$errors->first("price")}}
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
                                                         <h5 class="modal-title text-white" id="delete-product-{{$i}}">Delete <b>"{{$allproduct->title}}"</b></h5>
                                                         <button type="button"style="color: white" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                     </div>

                                                     <form method="post" action="{{url('delete/product')}}/{{$allproduct->id}}">
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
        </div>
    </div>
    </div>
@endsection

