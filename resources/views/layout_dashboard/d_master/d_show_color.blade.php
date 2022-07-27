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
                            <li class="breadcrumb-item  text-muted" aria-current="page">Product Color & Size</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Show Colors & Sizes</li>
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
                        <a href="/add/product/color" style="border: 1px solid white; border-radius: 10px; background-color: #006680; font-size: 16px;color: white; padding: 5px; float: right">Add Colors</a>

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
                                <th>Color</th>
                                <th>Size</th>
                                <th>Quantity</th>
                                <th>Delete</th>
                            </tr>
                            </thead>

                            <tbody>


                            <?php $i = 1;  ?>

                            @if(count($allcolors) > 0  && !empty($allcolors))

                                @foreach($allcolors as $allcolor)
                                    <?php $ti = \App\Product::where("id", $allcolor->product_id )->first()?>
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>{{$ti->title}}</td>
                                        <td >
                                            <a href="#" data-toggle="modal" data-target="#update-color-{{$i}}" style="color: black">
                                                {{$allcolor->pcolor}}
                                            </a>
                                        </td>
                                        <td >
                                            <a href="#" data-toggle="modal" data-target="#update-size-{{$i}}" style="color: black">
                                                {{$allcolor->psize}}
                                            </a>
                                        </td>
                                        <td >
                                            <a href="#" data-toggle="modal" data-target="#update-qty-{{$i}}" style="color: black">
                                            {{$allcolor->pquantity}}
                                            </a>
                                        </td>
                                        <td>
                                            {{--<a href="#" data-toggle="modal" class="btn btn-icon btn-outline-success" title="Update Product" data-target="#update-product-{{$i}}"> <span class="fas fa-pencil-alt"></span></a>--}}
                                            <a href="#" data-toggle="modal" class="btn btn-icon btn-outline-danger" title="Delete Product" data-target="#delete-product-{{$i}}"> <span class="fas fa-trash-alt"></span></a>
                                        </td>

                                        {{--Model for Language Proficiency Help Start--}}
                                        <div id="update-color-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-color-{{$i}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="card-header bg-dark" style="text-align: center">
                                                        <h5 class="modal-title text-white" id="update-color-{{$i}}">Update "{{$ti->title}}" Color</h5>
                                                        <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <form method="post" action="{{url('/update/product/color')}}/{{$allcolor->id}}">
                                                        {{method_field('put')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="form-group" style="display: none">
                                                                <input type="text" name="id" value="{{$ti->id}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Color</label><br>
                                                                <select class="selectpicker form-control" name="pcolor" style="cursor: pointer;" required>
                                                                    <option selected>{{$allcolor->pcolor}}</option>
                                                                    <option>Black</option>
                                                                    <option>Brown</option>
                                                                    <option>Blue</option>
                                                                    <option>Green</option>
                                                                    <option>Grey</option>
                                                                    <option>Orange</option>
                                                                    <option>Red</option>
                                                                    <option>White</option>
                                                                    <option>Yellow</option>
                                                                    <option>Pink</option>
                                                                    <option>Golden</option>
                                                                </select>

                                                                <input type="text" name="psize" value="{{$allcolor->psize}}" style="display: none">
                                                                <input type="text" name="pqty" value="{{$allcolor->pquantity}}" style="display: none">

                                                                @if($errors->has("pcolor"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("pcolor")}}
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
                                        {{--Model for Language Proficiency Help End--}}

                                        {{--Model for Language Proficiency Help Start--}}
                                        <div id="update-size-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-size-{{$i}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="card-header bg-dark" style="text-align: center">
                                                        <h5 class="modal-title text-white" id="update-size-{{$i}}">Update "{{$ti->title}}" Size</h5>
                                                        <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <form method="post" action="{{url('/update/product/size')}}/{{$allcolor->id}}">
                                                        {{method_field('put')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="form-group" style="display: none">
                                                                <input type="text" name="id" value="{{$ti->id}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Size</label><br>
                                                                <select class="selectpicker form-control" name="psize" style="cursor: pointer;" required>
                                                                    <option selected>{{$allcolor->psize}}</option>
                                                                    <optgroup label="Men">
                                                                        <option>39</option>
                                                                        <option>40</option>
                                                                        <option>41</option>
                                                                        <option>42</option>
                                                                        <option>43</option>
                                                                        <option>44</option>
                                                                    </optgroup>
                                                                    <optgroup label="Women">
                                                                        <option>36</option>
                                                                        <option>37</option>
                                                                        <option>38</option>
                                                                        <option>39</option>
                                                                        <option>40</option>
                                                                        <option>41</option>
                                                                    </optgroup>
                                                                    <optgroup label="Kids">
                                                                        <option>27</option>
                                                                        <option>28</option>
                                                                        <option>30</option>
                                                                        <option>31</option>
                                                                        <option>33</option>
                                                                    </optgroup>
                                                                </select>

                                                                <input type="text" name="pcolor" value="{{$allcolor->pcolor}}" style="display: none">
                                                                <input type="text" name="pqty" value="{{$allcolor->pquantity}}" style="display: none">

                                                                @if($errors->has("psize"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("psize")}}
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
                                        {{--Model for Language Proficiency Help End--}}



                                        {{--Model for Language Proficiency Help Start--}}
                                        <div id="update-qty-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="update-qty-{{$i}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="card-header bg-dark" style="text-align: center">
                                                        <h5 class="modal-title text-white" id="update-qty-{{$i}}">Update "{{$ti->title}}" Quantity</h5>
                                                        <button type="button" class="close" style="color: white" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <form method="post" action="{{url('/update/product/quantity')}}/{{$allcolor->id}}">
                                                        {{method_field('put')}}
                                                        {{csrf_field()}}
                                                        <div class="modal-body">
                                                            <div class="form-group" style="display: none">
                                                                <input type="text" name="id" value="{{$ti->id}}">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Quantity</label><br>
                                                                <input class="form-control" onkeypress='return event.charCode >= 48 && event.charCode <= 57' min="0" max="500" type="number" name="pqty" title="enter title" placeholder="enter product title here" value="{{$allcolor->pquantity}}" required>

                                                                <input type="text" name="pcolor" value="{{$allcolor->pcolor}}" style="display: none">
                                                                <input type="text" name="psize" value="{{$allcolor->psize}}" style="display: none">

                                                                @if($errors->has("pqty"))
                                                                    <div class="text-danger">
                                                                        {{$errors->first("pqty")}}
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
                                        {{--Model for Language Proficiency Help End--}}


                                        {{--Model for Language Proficiency Help Start--}}
                                        <div id="delete-product-{{$i}}" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="delete-product-{{$i}}" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark" >
                                                        <h5 class="modal-title" style="margin-left: 160px; color: white;" id="delete-product-{{$i}}">Delete {{--{{$i}}:--}}  "{{$ti->title}}"</h5>
                                                        <button type="button"style="color: white" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                    </div>

                                                    <form method="post" action="{{url('delete/colorsize')}}/{{$allcolor->id}}">
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
                        {{--{{$allcolors->links()}}--}}
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection

