@extends("layout_ace.main")
@section("title", strtoupper($title))

@section("content")
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ul>
                    <li class="home"> <a href="/home" title="Go to Home Page">Home</a><span>&mdash;›</span></li>
                    <li class=""> <a  title="Go to Home Page">@if(Request::is('shop*')) Shop @else Brand @endif</a><span>&mdash;›</span></li>
                    <li class="category13"><strong>{{$title}}</strong></li>
                    @if($category!="")
                        <li class="category13"><span>&mdash;›</span><strong>{{$category}}</strong></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="main-container col2-left-layout">
        <div class="main container">
            <div class="row">
                <section class="col-main col-sm-9 col-sm-push-3">
                    <div class="category-title">
                        <h1>{{$title}}</h1>
                    </div>
                    <div class="category-products">
                        <div class="toolbar">

                        </div>
                        <ul class="products-grid">

                            @if(count($mens) > 0  && !empty($mens))
                                <?php try{
                                    $mens->links();
                                }catch(Exception $e){}?>

                                @foreach($mens as $men)
                                        <?php
                                        $qty = \App\ProductColor::where('product_id' , $men->id)->get();
                                        $pquantity = $qty->sum('pquantity');
                                        ?>
                                            @if($pquantity == 0)
                                                <tr>
                                                    <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                        <div class="col-item" style="pointer-events: none; opacity: 0.5;">
                                                            <div class="sale-label sale-top-right" style="opacity: 1; width: 60%; margin-right: 21%; margin-top: 120px; background-color: #ffc60a; font-size: 15px">Out of Stock</div>
                                                            <div class="product-image-area">
                                                                <a class="product-image"   href="{{ url('/product_detail/'.$men->id) }}">
                                                                    <?php $img = \App\ProductImage::where('product_id' , $men->id)->first() ?>
                                                                    @if($img != '')
                                                                        <img style="width:100%; height: 262px" src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                                    @else
                                                                        <img style="width:100%; height: 262px" alt="No image" class="img-responsive">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                            <div class="info">
                                                                <div class="info-inner">
                                                                    <div class="item-title"> <a href="{{ url('/product_detail/'.$men->id) }}"> {{$men->title}} </a> </div>
                                                                    <div class="item-content">
                                                                        <div class="price-box">
                                                                            <p class="special-price"> <span class="price"> Rs. {{$men->price}} </span> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix"> </div>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </tr>
                                                @else
                                                    <tr>
                                                        <li class="item col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                            <div class="col-item">
                                                                <div class="product-image-area">
                                                                    <a class="product-image"   href="{{ url('/product_detail/'.$men->id) }}">
                                                                        <?php $img = \App\ProductImage::where('product_id' , $men->id)->first() ?>
                                                                        @if($img != '')
                                                                            <img style="width:100%; height: 262px" src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                                        @else
                                                                            <img style="width:100%; height: 262px" alt="No image" class="img-responsive">
                                                                        @endif
                                                                    </a>
                                                                </div>
                                                                <div class="info">
                                                                    <div class="info-inner">
                                                                        <div class="item-title"> <a href="{{ url('/product_detail/'.$men->id) }}"> {{$men->title}} </a> </div>
                                                                        <div class="item-content">
                                                                            <div class="price-box">
                                                                                <p class="special-price"> <span class="price"> Rs. {{$men->price}} </span> </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="clearfix"> </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </tr>
                                                @endif

                                @endforeach

                            @else
                                <br><br><br><h1 class="text-center"><b>No Items Found</b></h1>
                            @endif

                        </ul>

                    </div>
                </section>
                <aside class="col-left sidebar col-sm-3 col-xs-8 col-sm-pull-9" >
                    <div class="side-nav-categories">
                        <div class="block-title"> Categories </div>
                        <div class="box-content box-category">
                            <ul>
                                <li <?php if($title=="men") echo 'class="active"'; ?>> <a  href="/shop/men">Men</a> <span class="subDropdown <?php echo ($title=="men") ? ' minus' : ' plus'; ?>"></span>
                                    <ul class="level0_415">

                                        <li > <a href="/shop/men/casual" <?php if($category=="casual") echo 'style="color:cornflowerblue"'; ?>>Casual </a> </li>
                                        <li> <a href="/shop/men/formal" <?php if($category=="formal") echo 'style="color:cornflowerblue"'; ?>> Formal </a> </li>
                                        <li> <a href="/shop/men/sandals" <?php if($category=="sandals") echo 'style="color:cornflowerblue"'; ?>> Sandal </a> </li>
                                        <li> <a href="/shop/men/peshawri" <?php if($category=="peshawri") echo 'style="color:cornflowerblue"'; ?>> Peshawri </a> </li>
                                        <li> <a href="/shop/men/sports" <?php if($category=="sports") echo 'style="color:cornflowerblue"'; ?>> Sports </a> </li>

                                    </ul>
                                </li>

                                <li <?php if($title=="women") echo 'class="active"'; ?>> <a  href="/shop/women">Women</a> <span class="subDropdown <?php echo ($title=="women") ? ' minus' : ' plus'; ?>"></span>
                                    <ul class="level0_415">

                                        <li> <a href="/shop/women/casual" <?php if($category=="casual") echo 'style="color:cornflowerblue"'; ?>>Casual </a> </li>
                                        <li> <a href="/shop/women/formal" <?php if($category=="formal") echo 'style="color:cornflowerblue"'; ?>> Formal </a> </li>
                                        <li> <a href="/shop/women/heels" <?php if($category=="heels") echo 'style="color:cornflowerblue"'; ?>> Heels </a> </li>
                                        <li> <a href="/shop/women/sports" <?php if($category=="sports") echo 'style="color:cornflowerblue"'; ?>> Sports </a> </li>

                                    </ul>
                                </li>
                                <li <?php if($title=="kids") echo 'class="active"'; ?>> <a  href="/shop/kids">Kids</a> <span class="subDropdown <?php echo ($title=="kids") ? ' minus' : ' plus'; ?>"></span>
                                    <ul class="level0_415">

                                        <li > <a href="/shop/kids/boys" <?php if($category=="boys") echo 'style="color:cornflowerblue"'; ?>>  Boys</a> </li>
                                        <li > <a href="/shop/kids/girls" <?php if($category=="girls") echo 'style="color:cornflowerblue"'; ?>> Girls  </a> </li>

                                    </ul>

                                </li>
                                <li <?php if(Request::is('brand*')) echo 'class="active"'; ?>> <a>Brands</a> <span class="subDropdown <?php echo (Request::is('brand*')) ? ' minus' : ' plus'; ?>"></span>
                                    <ul class="level0_415">

                                        <?php $i=1; $brands = \App\PBrand::all();?>
                                        @if(count($brands))
                                            @foreach($brands as $b)
                                                <li> <a @if(Request::is('*/'.strtolower($b->brand))) style="color:cornflowerblue" @endif href="@if(Request::is('shop*'))./../@endif../brand/{{strtolower($b->brand)}}">{{$b->brand}}</a></li>
                                            @endforeach
                                        @endif

                                    </ul>

                                </li>

                            </ul>
                        </div>
                    </div>
                    <div class="block block-layered-nav">
                        <div class="block-title">Shop By</div>
                        <div class="block-content">
                            <p class="block-subtitle">Filter Result</p>
                            <dl id="narrow-by-list">
                                <dt class="odd">Price</dt>
                                <dd class="odd">
                                    <ol>
                                        <li> <a @if(Request::is('*/0-999')) style="color:red" @endif href="{{$url}}/0-999"><span >0</span> - <span >999</span></a>  </li>
                                        <li> <a @if(Request::is('*/1000-1999')) style="color:red" @endif href="{{$url}}/1000-1999"><span >1000</span> - <span >1999</span></a>  </li>
                                        <li> <a @if(Request::is('*/2000-2999')) style="color:red" @endif href="{{$url}}/2000-2999"><span >2000</span> - <span >2999</span></a>  </li>
                                        <li> <a @if(Request::is('*/3000-4999')) style="color:red" @endif href="{{$url}}/3000-4999"><span >3000</span> - <span>4999</span></a>  </li>
                                    </ol>
                                </dd>
                                @if(Request::is('shop*'))
                                <dt class="even">Brand</dt>
                                <dd class="even">
                                    <ol>
                                        <?php $i=1; $brands = \App\PBrand::all();?>
                                        @if(count($brands))
                                            @foreach($brands as $b)
                                                    <li> <a @if(Request::is('*/'.strtolower($b->brand))) style="color:red" @endif href="{{$url}}/{{strtolower($b->brand)}}">{{$b->brand}}</a></li>
                                                @endforeach
                                        @endif
                                    </ol>
                                </dd>
                                @endif
                                <dt class="odd">Color</dt>
                                <dd class="odd">
                                    <ol>

                                        <?php $colors = \App\ProductColor::distinct()->select('pcolor')->get();   ?>
                                        @foreach($colors as $color)
                                                <li> <a @if(Request::is('*/color-'.strtolower($color->pcolor))) style="color:red" @endif href="{{$url}}/color-{{strtolower($color->pcolor)}}">{{$color->pcolor}}</a> </li>

                                            @endforeach
                                    </ol>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </aside>
            </div>
            <div class="text-center">
                {{$mens->links()}}
            </div>
        </div>
    </div>
    <br><br><br><br><br><br>

@endsection