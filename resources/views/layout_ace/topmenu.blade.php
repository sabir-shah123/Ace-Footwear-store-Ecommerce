<header class="header-container">
    <div class="header-top" >
        <div class="container">
            <div class="row">
                <div class="col-xs-6">
                    <div class="dropdown block-language-wrapper" style="color: white">
                        <span class="call-icon">+92 305 7301880</span>
                    </div>
                    <div class="welcome-msg hidden-xs"> Shop with pleasure! </div>
                </div>
                <div class="col-xs-6">
                    <div class="toplinks">
                        <div class="links">
                                @auth
                                    @if(Auth::user()->role=="Admin")
                                        <div class="check"><a ><span class="hidden-xs">Currently Signed in with Admin Account</span></a></div>
                                    @else
                                        <div class="cartt"><a title="View Cart" href="/shopping_cart"><span class="hidden-xs">View Cart</span></a></div>
                                        <div class="check"><a title="Checkout" href="/checkout"><span class="hidden-xs">Checkout</span></a></div>
                                    @endif
                                @endauth
                                @guest
                                        <div class="cartt"><a title="View Cart" href="/shopping_cart"><span class="hidden-xs">View Cart</span></a></div>
                                        <div class="check"><a title="Checkout" href="/checkout"><span class="hidden-xs">Checkout</span></a></div>
                                        <div class="sin"><a title="Login" href="/customer/login"><span  class="hidden-xs">Login</span></a></div>
                                        <div class="myaccount"><a title="Signup" href="/customer/signup"><span  class="hidden-xs">Signup</span></a></div>
                                @else
                                <div class="dropdown block-language-wrapper">
                                    <a role="button" data-toggle="dropdown" data-target="#" class="block-language dropdown-toggle" href="#">
                                        <b>{{Auth::user()->name}}</b> <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu" role="menu" style="width: 150px">
                                        @auth
                                            @if(Auth::user()->role=="Admin")
                                                <li role="presentation">
                                                    <a role="menuitem" style="color:black" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        <i class="feather thisone icon-log-out float-right"></i> Logout
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                        @csrf
                                                    </form>
                                                </li>
                                            @else
                                                <li role="presentation">
                                                    <a role="menuitem" style="color:black;" tabindex="-1" href="/customer/account">Account</a>
                                                </li>
                                                <li role="presentation">
                                                    <a role="menuitem" style="color:black" tabindex="-1" href="/customer/order/history"> Order History </a>
                                                </li>
                                                <li role="presentation" >
                                                    <a role="menuitem" style="color:black" tabindex="-1" href="/customer/change/password"> Change Password </a>
                                                </li>
                                                <li role="presentation">
                                                    <a role="menuitem" style="color:black" tabindex="-1" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                         Logout
                                                    </a>
                                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                </li>
                                            @endif
                                        @endauth
                                    </ul>
                                </div>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header container">
        <div class="row">
            <div class="col-lg-10 col-sm-9 col-md-10 col-xs-1">
                <a class="logo" title="Ace" href="/home"><img src="{{asset('assets/images/yes.png')}}" width="90px" height="46px"></a>
            </div>
            {{--<div class="col-lg-6 col-sm-6 col-xs-11 col-md-8" style="margin-top: 13px; ">
                <div class="search-box">
                    <form action="/search" method="get" id="search_mini_form" name="Categories">
                            <input type="text" placeholder="Search here..." style="width: 300px" value="" maxlength="70" class="" name="search" id="search">
                    </form>
                </div>
            </div>--}}
            {{--<div class="col-lg-8 col-sm-4  col-md-8" style="margin-top: 7px; display: none">
                <div class="search-box" style="display: none">
                    <form action="cat" method="POST" id="search_mini_form" name="Categories">
                        <select name="category_id" class="cate-dropdown hidden-xs">
                            <option value="all">All Categories</option>
                            <option value="men">Men</option>
                            <option value=women>Women</option>
                            <option value="kids">Kids</option>
                        <input type="text" placeholder="Search here..." value="" maxlength="70" class="" name="search" id="search">
                        <button id="submit-button" class="search-btn-bg"><span>Search</span></button>
                        </select>
                    </form>
                </div>
            </div>--}}
            <div class="col-lg-2 col-sm-3 col-md-2" style="margin-top: 7px;">
                <div class="top-cart-contain">
                    <div class="mini-cart">
                        <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle">
                            <a href="/shopping_cart">
                                <i class="glyphicon glyphicon-shopping-cart"></i>
                                <div class="cart-box">
                                    <span class="title">cart</span>
                                    <span id="cart-total">
                                        @if(Session::has('cart'))
                                             {{count(Session::get('cart'))}}
                                            @else
                                                0
                                        @endif
                                            item
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div>
                            <div class="top-cart-content arrow_box">
                                @if(Session::has('cart'))
                                    @if(count(Session::get('cart'))>0)
                                    <div class="block-subtitle" style="cursor: default"> Recently added item(s)</div>
                                    @else
                                    <div class="block-subtitle" style="text-align: center; cursor: default">No Items in your Cart</div>
                                    @endif
                                    <ul id="cart-sidebar" class="mini-products-list" style="cursor: default">

                                        <?php
                                                $i=-1;
                                                $total = 0;
                                        ?>

                                        @foreach(Session::get('cart') as $ar)
                                            <?php
                                                $p  = App\Product::findOrFail($ar["id"]);
                                                $total +=$p->price*$ar["qty"] ;
                                                $i++?>
                                                <li class="item even" > <a class="product-image" href="#" style="cursor: default"><img src="{{asset('/images/products/')}}/<?php try{ echo $p->image[0]->pimage; }catch (Exception $e){} ?>" width="80"></a>
                                                    <div class="detail-item">
                                                        <div class="product-details"> <a href="/delete-to-cart/{{$ar["psize"]}}" title="Remove This Item" onClick="" class="glyphicon glyphicon-remove">&nbsp;</a>
                                                            <p class="product-name"> {{$p->title}} </p>
                                                        </div>
                                                        <div class="product-details-bottom"> <span class="price">Rs. {{$p->price*$ar["qty"]}}</span> <span class="title-desc">Qty:</span> <strong>{{$ar["qty"]}}</strong> </div>
                                                    </div>
                                                </li>
                                        @endforeach
                                    </ul>
                                    @if(count(Session::get('cart'))>0)
                                        <div class="top-subtotal" style="cursor: default">Subtotal: <span class="price">Rs. {{$total}}</span></div>

                                        <div class="actions" style="cursor: default">
                                            <a href="/checkout"><button class="btn-checkout" type="button">  <span>Checkout</span>  </button></a>
                                            <a href="/shopping_cart"><button class="view-cart" type="button">  <span>View Cart</span>  </button></a>
                                        </div>
                                    @endif
                                    @else
                                        <div class="block-subtitle" style="text-align: center">No Items in your Cart</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div id="ajaxconfig_info"> <a href="#/"></a>
                        <input value="" type="hidden">
                        <input id="enable_module" value="1" type="hidden">
                        <input class="effect_to_cart" value="1" type="hidden">
                        <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<nav>
    <div class="container">
        <div class="nav-inner">
            <div class="logo-small"> <a class="logo" title="Ace Footwear" href="{{ url('home') }}"><img src="{{asset('assets/images/yes.png')}}" width="60px" height="30px"></a> </div>
            <div class="hidden-desktop" id="mobile-menu">
                <ul class="navmenu">
                    <li>
                        <div class="menutop">
                            <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                            <h2>Menu</h2>
                        </div>
                        <ul class="submenu">
                            <li>
                                <ul class="topnav">
                                    <li class="level0 nav-6 level-top first parent"> <a class="level-top"> <span>New Arrivals</span> </a>
                                        <ul class="level0">
                                            <li class="level1 first"><a href="/shop/men"><span>Men</span></a></li>
                                            <li class="level1 nav-10-2"> <a href="/shop/women"> <span>Women</span> </a> </li>
                                            <li class="level1 nav-10-3"> <a href="/shop/kids"> <span>Kids</span> </a> </li>
                                        </ul>
                                    </li>
                                    <li class="level0 nav-8 level-top parent"> <a class="level-top" href="/shop/men"> <span>Men</span> </a>
                                        <ul class="level0">
                                            <li class="level1 nav-2-1 first parent"> <a href="/shop/men/casual"> <span>Casual</span> </a> </li>
                                            <li class="level1 nav-2-1 first parent"> <a href="/shop/men/formal"> <span>Formals</span> </a></li>
                                            <li class="level1 nav-2-1 first parent"> <a href="/shop/men/sandals"> <span>Sandals</span> </a></li>
                                            <li class="level1 nav-2-1 first parent"> <a href="/shop/men/peshawri"> <span>Peshawri</span> </a></li>
                                            <li class="level1 nav-2-1 first parent"> <a href="/shop/men/sports"> <span>Sports</span> </a> </li>
                                        </ul>
                                    </li>
                                    <li class="level0 nav-7 level-top parent"> <a class="level-top" href="/shop/women"> <span>Women</span> </a>
                                        <ul class="level0">
                                            <li class="level1 nav-1-1 first parent"> <a href="/shop/women/casual"> <span>Casual</span> </a></li>
                                            <li class="level1 nav-1-1 first parent"> <a href="/shop/women/formal"> <span>Formal</span> </a></li>
                                            <li class="level1 nav-1-1 first parent"> <a href="/shop/women/heels"> <span>Heels</span> </a></li>
                                            <li class="level1 nav-1-1 first parent"> <a href="/shop/women/sports"> <span>Sports</span> </a></li>
                                        </ul>
                                    </li>
                                    <li class="level0 nav-6 level-top first parent"> <a class="level-top" href="/shop/kids"> <span>Kids</span> </a>
                                        <ul>
                                            <li class="level1 first"><a href="/shop/kids/boys"><span>Boys</span></a></li>
                                            <li class="level1 nav-10-2"> <a href="/shop/kids/girls"> <span>Girls</span> </a> </li>
                                        </ul>
                                    </li>
                                    <li class="level0 nav-6 level-top first parent"> <a class="level-top" href="#"> <span>Brands</span> </a>
                                        <ul class="level0">
                                            <?php $i=1; $brands = \App\PBrand::all();?>
                                            @if(count($brands))
                                                    @foreach($brands as $b)
                                            <li class="level1 first"><a href="/brand/{{strtolower($b->brand)}}"><span>{{$b->brand}}</span></a></li>
                                           @endforeach
                                                @endif
                                             </ul>
                                    </li>
                                    <li class="level0 nav-10 level-top "> <a class="level-top" href="/about-us"> <span>About us</span> </a> </li>
                                    <li class="level0 nav-10 level-top "> <a class="level-top" href="/contact-us"> <span>Contact us</span> </a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <ul id="nav" class="hidden-xs">
                <li class="nav-custom-link level0 level-top parent"> <a class="level-top"><span>New Arrivals</span></a>
                    <div class="level0-wrapper custom-menu">
                        <div class="header-nav-dropdown-wrapper clearer">
                            <div class="arriv">
                                <div class="grid12-5">
                                    <div class="custom_img" >
                                        <a href="/shop/men"><img src="{{asset('assets/images/men.jpg')}}" width="240px" height="290px" alt="custom img1"></a>
                                    </div>
                                    <h3 style="margin-left:70px;">Men</h3>
                                </div>
                                <div class="grid12-5">
                                    <div class="custom_img"><a href="/shop/women"><img src="{{asset('assets/images/women.jpg')}}" width="240px" height="290px" alt="custom img2"></a></div>
                                    <h3 style="margin-left:70px;">Women</h3>
                                </div>
                                <div class="grid12-5">
                                    <div class="custom_img"><a href="/shop/kids"><img src="{{asset('assets/images/kids.jpg')}}" width="240px" height="290px" alt="custom img3"></a></div>
                                    <h3 style="margin-left:70px;">Kids</h3>
                                </div>
                            </div>

                        </div>
                    </div>
                </li>
                <li class="level0 nav-5 level-top first"> <a class="level-top" href="/shop/men"> <span>Men</span> </a>
                    <div class="level0-wrapper dropdown-6col">
                        <div class="level0-wrapper2">
                            <div class="nav-block nav-block-center">
                                <ul class="level0" style="margin-bottom: 40px; margin-top: 15px;">
                                    <li class="level3 nav-6-1 parent item" style="width: 180px; margin-right:20px;  margin-bottom: 10px; border: 1px solid grey; padding: 10px; border-radius: 15px;"> <a href="/shop/men/casual"><span>Casual</span></a>
                                        <div class="push_item">
                                            <div class="push_img"><a href="/shop/men/casual"><img src="{{asset('assets/images/mencasual.jpg')}}" style="margin-left: 15px;" width="130px" height="150px" alt="sunglass"></a></div>
                                        </div>
                                    </li>

                                    <li class="level3 nav-6-1 parent item" style="width: 180px; margin-right:20px;  margin-bottom: 10px; border: 1px solid grey; padding: 10px; border-radius: 15px;"> <a href="/shop/men/formal"><span>Formal</span></a>
                                        <div class="push_item">
                                            <div class="push_img"><a href="/shop/men/formal"><img src="{{asset('assets/images/menformal.jpg')}}" style="margin-left: 15px;" width="130px" height="150px" alt="watch"></a></div>
                                        </div>
                                    </li>

                                    <li  class="level3 nav-6-1 parent" style="width: 180px; margin-right:20px;  margin-bottom: 10px; border: 1px solid grey; padding: 10px; border-radius: 15px;"> <a href="/shop/men/sandals"><span>Sandals</span></a>
                                            <div class="push_item">
                                                <div class="push_img"><a href="/shop/men/sandals"><img src="{{asset('assets/images/mensandal.jpg')}}" style="margin-left: 15px;" width="130px" height="150px" alt="jeans"></a></div>
                                            </div>
                                    </li>

                                    <li class="level3 nav-6-1 parent item" style="width: 180px; margin-right:20px;  margin-bottom: 10px; border: 1px solid grey; padding: 10px; border-radius: 15px;"> <a href="/shop/men/peshawri"><span>Peshawri</span></a>
                                        <div class="push_item">
                                            <div class="push_img">
                                                <a href="/shop/men/peshawri">
                                                    <img src="{{asset('assets/images/menpeshawri.jpg')}}" style="margin-left: 15px;" width="130px" height="150px" alt="shoes">
                                                </a>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="level3 nav-6-1 parent item" style="width: 180px; margin-right:20px;  margin-bottom: 10px; border: 1px solid grey; padding: 10px; border-radius: 15px;"> <a href="/shop/men/sports"><span>Sports</span></a>
                                        <div class="push_item push_item_last">
                                            <div class="push_img"><a href="/shop/men/sports"><img src="{{asset('assets/images/mensports.jpg')}}" style="margin-left: 15px;" width="130px" height="150px" alt="swimwear"></a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="level0 nav-5 level-top first"> <a class="level-top" href="/shop/women"> <span>Women</span> </a>
                    <div class="level0-wrapper dropdown-6col">
                        <div class="level0-wrapper2">
                            <div class="nav-block nav-block-center">
                                <ul class="level0" style="margin: 15px 10px 45px 50px;">
                                    <li class="level3 nav-6-1 parent item" style="width: 220px; margin-right:20px;  margin-bottom: 10px; border: 1px solid grey; padding: 10px; border-radius: 15px;"> <a href="/shop/women/casual"><span>Casual</span></a>
                                        <div class="push_item">
                                            <div class="push_img"><a href="/shop/women/casual"><img src="{{asset('assets/images/wocasual.jpg')}}" width="130px" height="150px" alt="sunglass"></a></div>
                                        </div>
                                    </li>
                                    <li class="level3 nav-6-1 parent item" style="width: 220px; margin-right:20px;  margin-bottom: 10px; border: 1px solid grey; padding: 10px; border-radius: 15px;"> <a href="/shop/women/formal"><span>Formal</span></a>
                                        <div class="push_item">
                                            <div class="push_img"><a href="/shop/women/formal"><img src="{{asset('assets/images/woformal.jpg')}}" width="130px" height="150px" alt="watch"></a></div>
                                        </div>
                                    </li>

                                    <li  class="level3 nav-6-1 parent" style="width: 220px; margin-right:20px;  margin-bottom: 10px; border: 1px solid grey; padding: 10px; border-radius: 15px;"> <a href="/shop/women/heels"><span>Heels</span></a>
                                        <div class="push_item">
                                            <div class="push_img"><a href="/shop/women/heels"><img src="{{asset('assets/images/woheel.jpg')}}" width="130px" height="150px" alt="jeans"></a></div>
                                        </div>
                                    </li>

                                    <li class="level3 nav-6-1 parent item" style="width: 220px; margin-right:20px;  margin-bottom: 10px; border: 1px solid grey; padding: 10px; border-radius: 15px;"> <a href="/shop/women/sports"><span>Sports</span></a>
                                        <div class="push_item push_item_last">
                                            <div class="push_img"><a href="/shop/women/sports"><img src="{{asset('assets/images/wosports.jpg')}}" width="130px" height="150px" alt="swimwear"></a></div>
                                        </div>

                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="level0 parent drop-menu"><a href="/shop/kids"><span>Kids</span> </a>
                    <ul class="level1">
                        <li class="level1 first" style="margin-left: -70px;"><a href="/shop/kids/boys"><span>Boys</span></a></li>
                        <li class="level1 nav-10-2" style="margin-left: -70px;"> <a href="/shop/kids/girls"> <span>Girls</span> </a> </li>
                    </ul>
                </li>

                <li class="nav-custom-link level0 level-top parent"> <a class="level-top" href="#"><span>Brands</span></a>
                    <div class="level0-wrapper custom-menu">
                        <div class="header-nav-dropdown-wrapper clearer">

                                    <?php $i=1; $brands = \App\PBrand::all();?>
                                    @if(count($brands))
                                        @foreach($brands as $b)
                                                @if($i==4)
                        </div>
                                                <?php $i=1;?>
                                                @endif
                                                @if($i==1)
                                                <div class="row mb-5" style="margin-bottom: 25px; margin-right: 6px;">
                                                    @endif
                                                    <div class="col-sm-4 col-xs-4 col-xm-4 col-md-4 col-xl-4">
                                                        <div class="custom_img" style="margin-top: 17px"><a href="/brand/{{strtolower($b->brand)}}"><img src="{{asset('/images/brands/')}}/{{$b->image}}" width="150px" height="40px" alt="{{$b->brand}}"></a></div>
                                                        <button type="button" style="width: 210px; margin-top: 33px"  class="learn_more_btn"><a href="/brand/{{strtolower($b->brand)}}">View</a></button>
                                                    </div>
                                                    <?php $i++;?>
                                        @endforeach
                                    @else
                                        No Brand
                                    @endif
                        </div>
                    </div>
                </li>
                <li class="level0 parent drop-menu">
                    <a href="/about-us">
                        <span>About us</span>
                    </a>
                </li>
                <li class="level0 parent drop-menu">
                    <a href="/contact-us">
                        <span>Contact us</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>