@extends("layout_ace.main")
@section("title", "Home")

@section("content")
    <div id="magik-slideshow" class="magik-slideshow">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12 col-md-8">
                    <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
                        <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
                            <ul>
                                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb=''><img src='{{asset('assets/images/ban2.jpg')}}' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                    <div    class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='45'  data-y='30'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>
                                        Exclusive of designer
                                    </div>
                                    <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='45'  data-y='70'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>
                                        Leather Shoes
                                    </div>
                                    <div    class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='130'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>
                                        Providing the best classy look<br>
                                         to enhance your personality
                                    </div>
                                </li>
                                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='' class="black-text"><img src='{{asset('assets/images/banner2.jpg')}}'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                    <div class='tp-caption ExtraLargeTitle sft  tp-resizeme ' data-x='45'  data-y='30'  data-endspeed='500'  data-speed='500' data-start='1100' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:2; white-space:nowrap;'>
                                        Super Hot
                                    </div>
                                    <div    class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='45'  data-y='70'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3; white-space:nowrap;'>
                                        Sports Shoes for Men                                    </div>
                                    <div    class='tp-caption Title sft  tp-resizeme ' data-x='45'  data-y='130'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'>
                                        Comfortale to wear<br>
                                        with soft sole
                                    </div>
                                </li>
                                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='' class="black-text">
                                    <img src='{{asset('assets/images/ban3.jpg')}}'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
                                </li>
                            </ul>
                            <div class="tp-bannertimer"></div>
                        </div>
                    </div>
                </div>
                <aside class="col-xs-12 col-sm-12 col-md-4">
                    <div class="RHS-banner">
                        <div class="add"><a href="#"><img alt="banner-img" width="410px" height="457px" src="{{asset('assets/images/ban6.png')}}"></a>
                            <div class="overlay"><span><a class="info">Kids</a></span></div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header-service">
            <div class="col-lg-3 col-sm-6 col-xs-3">
                <div class="content">
                    <div class="icon-truck">&nbsp;</div>
                    <span class="hidden-xs"><strong>FREE SHIPPING</strong> on order over $99</span></div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-3">
                <div class="content">
                    <div class="icon-support">&nbsp;</div>
                    <span class="hidden-xs"><strong>Customer Support</strong> Service</span></div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-3">
                <div class="content">
                    <div class="icon-money">&nbsp;</div>
                    <span class="hidden-xs">3 days <strong>Money Back</strong> Guarantee</span></div>
            </div>
            <div class="col-lg-3 col-sm-6 col-xs-3">
                <div class="content">
                    <div class="icon-dis">&nbsp;</div>
                    <span class="hidden-xs"><strong>5% discount</strong> on order over $199</span></div>
            </div>
        </div>
    </div>
    <section class="main-container col1-layout home-content-container">
        <div class="container">
            <div class="std">
                <div class="best-seller-pro">
                    <div class="slider-items-products">
                        <div class="new_title center">
                            <h2>Shop</h2>
                        </div>
                        <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col4">
                            @if(count($alls) > 0  && !empty($alls))
                                <?php try{
                                    $alls->links();
                                }catch(Exception $e){}?>
                                @foreach($alls as $all)
                                    <?php
                                    $qty = \App\ProductColor::where('product_id' , $all->id)->get();
                                    $pquantity = $qty->sum('pquantity');
                                    ?>

                                    @if($pquantity == 0)
                                        <!-- Item -->
                                            <div class="item" style="pointer-events: none; opacity: 0.5;">
                                                <div class="col-item">
                                                    <div class="sale-label sale-top-right" style="width: 80%; margin-right: 10%; margin-top: 110px; background-color: #ffc60a; font-size: 13px">Out of Stock</div>
                                                    <div class="new-label new-top-right">New</div>
                                                    <div class="product-image-area">
                                                        <a class="product-image" title="Sample Product" href="{{ url('/product_detail/'.$all->id) }}">
                                                            <?php $img = \App\ProductImage::where('product_id' , $all->id)->first() ?>
                                                            @if($img != '')
                                                                <img style="width:100%; height: 272px" src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                            @else
                                                                <img style="width:100%; height: 272px"  alt="No image" class="img-responsive">

                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="info">
                                                        <div class="info-inner">
                                                            <div class="item-title"> <a title=" Sample Product" href="{{ url('/product_detail/'.$all->id) }}"> {{$all->title}}  </a> </div>
                                                            <div class="item-content">

                                                                <div class="price-box">
                                                                    <p class="special-price"> <span class="price"> Rs. {{$all->price}} </span> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="item">
                                                <div class="col-item">
                                                    <div class="new-label new-top-right">New</div>
                                                    <div class="product-image-area">
                                                        <a class="product-image" title="Sample Product" href="{{ url('/product_detail/'.$all->id) }}">
                                                            <?php $img = \App\ProductImage::where('product_id' , $all->id)->first() ?>
                                                            @if($img != '')
                                                                <img style="width:100%; height: 272px"  src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                            @else
                                                                <img style="width:100%; height: 272px"  alt="No image" class="img-responsive">

                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="info">
                                                        <div class="info-inner">
                                                            <div class="item-title"> <a title=" Sample Product" href="{{ url('/product_detail/'.$all->id) }}"> {{$all->title}}  </a> </div>
                                                            <div class="item-content">
                                                                <div class="price-box">
                                                                    <p class="special-price"> <span class="price"> Rs. {{$all->price}} </span> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                @endforeach
                            @endif

                            </div>
                            @if(count($alls) == 0)
                                <h2 class="text-center" style="height: 164px; margin-top: 60px"><b>No Items</b></h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><hr>

    <div class="offer-banner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12 col-sm-4"><a href="#"><img alt="offer banner1" width="370px" height="288px" src="{{asset('assets/images/menz2.jpg')}}"></a>
                    <div class="overlay"><a class="info" href="#">Men</a></div>
                </div>
                <div class="col-lg-4 col-xs-12 col-sm-4"><a href="#"><img alt="offer banner2" width="370px" height="288px" src="{{asset('assets/images/womenz2.jpg')}}"></a>
                    <div class="overlay"><a class="info" href="#">Women</a></div>
                </div>
                <div class="col-lg-4 col-xs-12 col-sm-4"><a href="#"><img alt="offer banner3" width="370px" height="288px" src="{{asset('assets/images/kidsz.jpg')}}"></a>
                    <div class="overlay"><a class="info" href="#">Kids</a></div>
                </div>
            </div>
        </div>
    </div><hr>

    <section class="featured-pro container">
        <div class="slider-items-products">
            <div class="new_title center">
                <h2>Kids</h2>
            </div>
            <div id="featured-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4">

                @if(count($kid) > 0  && !empty($kid))
                    <?php try{
                        $kid->links();
                    }catch(Exception $e){}?>
                    @foreach($kid as $kids)
                        <?php
                        $qty = \App\ProductColor::where('product_id' , $kids->id)->get();
                        $pquantity = $qty->sum('pquantity');

                        ?>

                        @if($pquantity == 0)

                                <div class="item" style="pointer-events: none; opacity: 0.5;">
                                    <div class="col-item">
                                        <div class="sale-label sale-top-right" style="width: 80%; margin-right: 10%; margin-top: 70px; background-color: #ffc60a; font-size: 13px">Out of Stock</div>
                                        <div class="product-image-area">
                                            <a class="product-image"  href="{{ url('/product_detail/'.$kids->id) }}">
                                                <?php $img = \App\ProductImage::where('product_id' , $kids->id)->first() ?>
                                                @if($img != '')
                                                    <img style="width:100%; height: 173px" src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                @else
                                                    <img style="width:100%; height: 173px" alt="No image" class="img-responsive">

                                                @endif
                                            </a>

                                        </div>
                                        <div class="info">
                                            <div class="info-inner">
                                                <div class="item-title"> <a  href="{{ url('/product_detail/'.$kids->id) }}"> {{$kids->title}} </a> </div>
                                                <div class="item-content">

                                                    <div class="price-box">
                                                        <p class="special-price"> <span class="price"> Rs. {{$kids->price}} </span> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="item">
                                    <div class="col-item">
                                        <div class="product-image-area">
                                            <a class="product-image"  href="{{ url('/product_detail/'.$kids->id) }}">
                                                <?php $img = \App\ProductImage::where('product_id' , $kids->id)->first() ?>
                                                @if($img != '')
                                                    <img style="width:100%; height: 173px" src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                @else
                                                    <img style="width:100%; height: 173px" alt="No image" class="img-responsive">

                                                @endif
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="info-inner">
                                                <div class="item-title"> <a  href="{{ url('/product_detail/'.$kids->id) }}"> {{$kids->title}} </a> </div>
                                                <div class="item-content">

                                                    <div class="price-box">
                                                        <p class="special-price"> <span class="price"> Rs. {{$kids->price}} </span> </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"> </div>
                                        </div>
                                    </div>
                                </div>
                        @endif
                    @endforeach
                @endif

                </div>
                @if(count($kid) == 0)
                    <h2 class="text-center" style="height: 164px; margin-top: 60px"><b>No Items in Kids</b></h2>
                @endif
            </div>
        </div>
    </section>

    <section class="middle-slider container">
        <div class="row">
            <div class="col-md-6">
                <div class="bag-product-slider small-pr-slider cat-section">
                    <div class="slider-items-products">
                        <div class="new_title center">
                            <h2>Men</h2>
                        </div>
                        <div id="bag-seller-slider" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col3">

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

                                            <div class="item" style="pointer-events: none; opacity: 0.5;">
                                                <div class="col-item" >
                                                    <div class="sale-label sale-top-right" style="width: 80%; margin-right: 10%; margin-top: 70px; background-color: #ffc60a; font-size: 13px">Out of Stock</div>
                                                    <div class="product-image-area">
                                                        <a class="product-image"  href="{{ url('/product_detail/'.$men->id) }}">
                                                            <?php $img = \App\ProductImage::where('product_id' , $men->id)->first() ?>
                                                            @if($img != '')
                                                                <img style="width: 100%; height: 160px" src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                            @else
                                                                <img style="width: 100%; height: 160px" alt="No image" class="img-responsive">

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
                                            </div>
                                        @else

                                            <div class="item">
                                                <div class="col-item">
                                                    <div class="product-image-area">
                                                        <a class="product-image"  href="{{ url('/product_detail/'.$men->id) }}">
                                                            <?php $img = \App\ProductImage::where('product_id' , $men->id)->first() ?>
                                                            @if($img != '')
                                                                <img style="width: 100%; height: 160px" src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                            @else
                                                                <img style="width: 100%; height: 160px" alt="No image" class="img-responsive">

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
                                            </div>
                                    @endif
                                @endforeach
                            @endif

                            </div>
                            @if(count($mens) == 0)
                                <h2 class="text-center" style="height: 154px; margin-top: 90px"><b>No Items</b></h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="shoes-product-slider small-pr-slider cat-section">
                    <div class="slider-items-products">
                        <div class="new_title center">
                            <h2>Women</h2>
                        </div>
                        <div id="shoes-slider" class="product-flexslider hidden-buttons">
                            <div class="slider-items slider-width-col3">


                            @if(count($womens) > 0  && !empty($womens))
                                <?php try{
                                    $womens->links();
                                }catch(Exception $e){}?>
                                @foreach($womens as $women)


                                    <?php
                                    $qty = \App\ProductColor::where('product_id' , $women->id)->get();
                                    $pquantity = $qty->sum('pquantity');

                                    ?>

                                    @if($pquantity == 0)
                                            <div class="item" style="pointer-events: none; opacity: 0.5;">
                                                <div class="col-item" >
                                                    <div class="sale-label sale-top-right" style="width: 80%; margin-right: 10%; margin-top: 70px; background-color: #ffc60a; font-size: 13px">Out of Stock</div>
                                                    <div class="product-image-area" >
                                                        <a class="product-image"  href="{{ url('/product_detail/'.$women->id) }}">
                                                            <?php $img = \App\ProductImage::where('product_id' , $women->id)->first() ?>
                                                            @if($img != '')
                                                                <img style="width: 100%; height: 160px" src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                            @else
                                                                <img style="width: 100%; height: 160px" alt="No image" class="img-responsive">

                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="info">
                                                        <div class="info-inner">
                                                            <div class="item-title"> <a title=" Sample Product" href="{{ url('/product_detail/'.$women->id) }}"> {{$women->title}} </a> </div>
                                                            <div class="item-content">
                                                                <div class="price-box">
                                                                    <p class="special-price"> <span class="price"> Rs. {{$women->price}} </span> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                </div>
                                            </div>

                                        @else

                                            <div class="item">
                                                <div class="col-item">
                                                    <div class="product-image-area">
                                                        <a class="product-image"  href="{{ url('/product_detail/'.$women->id) }}">
                                                            <?php $img = \App\ProductImage::where('product_id' , $women->id)->first() ?>
                                                            @if($img != '')
                                                                <img style="width: 100%; height: 160px" src="{!! url('/images/products/'.$img->pimage) !!}" class="img-responsive">
                                                            @else
                                                                <img style="width: 100%; height: 160px" alt="No image" class="img-responsive">

                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="info">
                                                        <div class="info-inner">
                                                            <div class="item-title"> <a title=" Sample Product" href="{{ url('/product_detail/'.$women->id) }}"> {{$women->title}} </a> </div>
                                                            <div class="item-content">
                                                                <div class="price-box">
                                                                    <p class="special-price"> <span class="price"> Rs. {{$women->price}} </span> </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"> </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                @endforeach
                            @endif

                            </div>
                            @if(count($womens) == 0)
                                <h2 class="text-center" style="height: 154px; margin-top: 90px"><b>No Items</b></h2>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br><br><br><br>

@endsection