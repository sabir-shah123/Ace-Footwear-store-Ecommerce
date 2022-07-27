@extends("layout_dashboard.main")
@section("title", "Add Image")

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
                            <li class="breadcrumb-item text-muted" aria-current="page">Product Image</li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Add Product Image</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center" style="margin-top: 4px;"><b>Add Product Image</b>
                <a href="/show/all/images" style="border: 1px solid white; border-radius: 10px; background-color: #006680;   font-size: 16px;color: white; padding: 5px; float: right">Show Images</a>
            </h3>
        </div>
        <div class="card-body">

            <form method="post" action="{{url("/store-image")}}" enctype="multipart/form-data">
                @csrf

                    <div class="form-group">
                        <label>Product Title/Name</label><br>
                        <select class="selectpicker form-control" name="title" style="cursor: pointer;" required>
                            <option></option>
                            @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>

                        @if($errors->has("title"))
                            <div class="text-danger">
                                {{$errors->first("title")}}
                            </div>
                        @endif
                    </div>
                    <hr>
                    <div class="form-group">
                        <input class="form-control" type="file" name="pimage" accept="image/*" style="cursor: pointer;"  onchange="showMyImage(this)" required/>
                        @if($errors->has("pimage"))
                            <div class="text-danger">
                                {{$errors->first("pimage")}}
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
                    <hr>

                    <button type="submit" class="btn btn-primary shadow-2 btn-lg mt-5" style="width: 30%; height: 60px; float: right;">Add Image</button>
            </form>
         </div>
    </div>

@endsection