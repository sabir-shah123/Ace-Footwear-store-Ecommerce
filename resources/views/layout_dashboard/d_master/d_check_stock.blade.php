@extends("layout_dashboard.main")
@section("title", "Stock")

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
                            <li class="breadcrumb-item text-muted active" aria-current="page">check remaining stock</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow-2">
        <div class="card-header bg-info">
            <h3 class="text-white text-center"><b>Remaining Stock</b></h3>
        </div>
        <div class="card-body">

            <form method="post" action="{{url("/remaining/stock")}}">
                @csrf
                <?php
                    $products = \App\Product::all();
                    $brand = \App\PBrand::all();
                    $colorss = \App\ProductColor::all();
                    $colors = \App\ProductColor::distinct()->select('pcolor')->orderBy('pcolor','asc')->get();
                    $size = \App\ProductColor::distinct()->select('psize')->orderBy('psize','asc')->get();
                ?>
                <div class="row form-group">
                    <div class="col-md-4">
                        <label>Product Title/Name</label><br>
                        <select class="selectpicker form-control" name="title" style="cursor: pointer;">
                            <option ></option>
                            @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->title}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Catalog</label><br>
                        <select class="selectpicker form-control" name="catalog" style="cursor: pointer;">
                            <option></option>
                            <option>Men</option>
                            <option>Women</option>
                            <option>Kids</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Brand</label><br>
                        <select class="selectpicker form-control" name="brand" style="cursor: pointer;">
                            <option></option>
                            @foreach ($brand as $brands)
                                <option>{{$brands->brand}}</option>
                            @endforeach
                        </select>
                    </div>
                </div><hr>

                <div class="row form-group">
                    <div class="col-md-6">
                        <label style="font-size: 15px;">Color</label><br>
                        <select id="pcolor" class="form-control selectpicker" name="color" style="cursor: pointer;">
                            <option></option>
                            @foreach($colors as $color)
                                <option>{{$color->pcolor}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Size</label><br>
                        <select class="form-control selectpicker" name="size" style="cursor: pointer;">
                            <option></option>
                            @foreach($size as $sizes)
                                <option>{{$sizes->psize}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary shadow-2" >Search</button>
            </form><br><br><br><br>

            <hr>
            <h3 class="text-center"><b>Remaining Quantity:</b></h3>
            {{--<span style="margin-left: 40px">
                for {{$title}}
            </span>--}}
            <div>
                <h1 class="text-center f-w-300 text-muted" style="margin-top: 30px">
                    @if(!empty($result))
                        <span style="font-size: 70px;">{{$result}}</span>
                    @else
                        <span style="font-size: 70px;">0</span>
                    @endif
                </h1>
            </div>
        </div>
    </div>

@endsection