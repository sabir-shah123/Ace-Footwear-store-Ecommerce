@extends("layout_dashboard.main")
@section("title", "Add Product")

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
                            <li class="breadcrumb-item text-muted active" aria-current="page">Add Product</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center" style="margin-top: 4px;"><b>Add Product</b>
                <a href="/show/all/products" style="border: 1px solid white; border-radius: 10px; background-color: #006680;  font-size: 16px;color: white; padding: 5px; float: right">Show all Products</a>
            </h3>
        </div>
        <div class="card-body">

            <form method="post" action="{{url("/store")}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    {{--<label class="mb-3">Upload your Product Photos <span style="font-size: 12px; font-style: italic; color: red;">(Ratio: 200px X 200px)</span></label>
                    <div class="row">
                        <div class="col-sm-3">
                            <input class="form-control" type="file" name="image_1" accept="image/*" style="cursor: pointer;"  onchange="showMyImage1(this)" value="{{old('image_1')}}"/>
                            @if($errors->has("image_1"))
                                <div class="text-danger">
                                    {{$errors->first("image_1")}}
                                </div>
                            @endif
                            <br/>
                            <img class="ml-5" id="thumbnail1" style="width:40%; height: 50%; margin-top:10px;"  src="" alt=""/>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-control" type="file" name="image_2" accept="image/*" style="cursor: pointer;"  onchange="showMyImage2(this)" value="{{old('image_2')}}"/>
                            @if($errors->has("image_2"))
                                <div class="text-danger">
                                    {{$errors->first("image_2")}}
                                </div>
                            @endif
                            <br/>
                            <img class="ml-5" id="thumbnail2" style="width:50%; height: 50%; margin-top:10px;"  src="" alt=""/>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-control" type="file" name="image_3" accept="image/*" style="cursor: pointer;"  onchange="showMyImage3(this)" value="{{old('image_3')}}"/>
                            @if($errors->has("image_3"))
                                <div class="text-danger">
                                    {{$errors->first("image_3")}}
                                </div>
                            @endif
                            <br/>
                            <img class="ml-5" id="thumbnail3" style="width:50%; height: 50%; margin-top:10px;"  src="" alt=""/>
                        </div>

                        <div class="col-sm-3">
                            <input class="form-control" type="file" name="image_4" accept="image/*" style="cursor: pointer;"  onchange="showMyImage4(this)" value="{{old('image_4')}}" />
                            @if($errors->has("image_4"))
                                <div class="text-danger">
                                    {{$errors->first("image_4")}}
                                </div>
                            @endif
                            <br/>
                            <img class="ml-5" id="thumbnail4" style="width:50%; height: 50%; margin-top:10px;"  src="" alt=""/>
                        </div>

                    </div><hr>--}}

                    {{--<script>
                        function showMyImage1(fileInput) {
                            var files = fileInput.files;
                            for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                var imageType = /image.*/;
                                if (!file.type.match(imageType)) {
                                    continue;
                                }
                                var img=document.getElementById("thumbnail1");
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
                    <script>
                        function showMyImage2(fileInput) {
                            var files = fileInput.files;
                            for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                var imageType = /image.*/;
                                if (!file.type.match(imageType)) {
                                    continue;
                                }
                                var img=document.getElementById("thumbnail2");
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
                    <script>
                        function showMyImage3(fileInput) {
                            var files = fileInput.files;
                            for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                var imageType = /image.*/;
                                if (!file.type.match(imageType)) {
                                    continue;
                                }
                                var img=document.getElementById("thumbnail3");
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
                    <script>
                        function showMyImage4(fileInput) {
                            var files = fileInput.files;
                            for (var i = 0; i < files.length; i++) {
                                var file = files[i];
                                var imageType = /image.*/;
                                if (!file.type.match(imageType)) {
                                    continue;
                                }
                                var img=document.getElementById("thumbnail4");
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
                    </script>--}}

                    <div class="form-group">
                    <label>Product Title/Name</label>
                    <input class="form-control" type="text" name="title" title="enter title" placeholder="enter product title here" value="{{old('title')}}" required>

                    @if($errors->has("title"))
                        <div class="text-danger">
                            {{$errors->first("title")}}
                        </div>
                    @endif
                    </div>
                    <hr>

                    <div class="row form-group">
                        <div class="col-sm-4">
                            <label>Catalog</label><br>
                            <select class="selectpicker form-control" name="catalog" style="cursor: pointer;" value="{{old('catalog')}}" required>
                                <option></option>
                                <option>Men</option>
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
                            <select class="selectpicker form-control" name="category" style="cursor: pointer;" value="{{old('category')}}" required>
                                <option ></option>
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
                            <label>Brand</label><br>
                            <select class="selectpicker form-control" name="brand" style="cursor: pointer;" value="{{old('brand')}}" required>
                                <option></option>
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
                        <input class="form-control" type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="price" placeholder="enter product price here" value="{{old('price')}}" required>
                        @if($errors->has("price"))
                            <div class="text-danger">
                                {{$errors->first("price")}}
                            </div>
                        @endif
                        </div><hr>

                    <button type="submit" class="btn btn-primary shadow-2 btn-lg mt-5" style="width: 30%; height: 60px; float: right;">Add Data</button>
                </div>
            </form>

        </div>
    </div>

@endsection