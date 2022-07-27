<nav class="pcoded-navbar">
    <div class="navbar-wrapper">
        <div class="navbar-brand header-logo">
            <a href="{{url('d_home')}}" class="b-brand">
                <span>
                    <i class="feather icon-shopping-cart" style="color: white; font-size: xx-large"></i>
                </span>
                <span class="b-title">Ace Dashboard</span>
            </a>
            <a class="mobile-menu" id="mobile-collapse" href="javascript:"><span></span></a>
        </div>
        <div class="navbar-content scroll-div">
            <ul class="nav pcoded-inner-navbar">
                <li class="nav-item pcoded-menu-caption">
{{--
                    <label>Navigation</label>
--}}
                </li>
                <li data-username="Products" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-box"></i>
                        </span><span class="pcoded-mtext">Products</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
                            <a href="#!" class="nav-link"><span class="pcoded-mtext">Product Details</span></a>
                            <ul class="pcoded-submenu">
                                <li class=""><a href="{{url('add/product')}}" class=""><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span>Add Product</a></li>
{{--                                <li class=""><a href="" class="" target="_blank"><span class="pcoded-micon"><i class="feather icon-upload"></i></span>Update Product</a></li>
                                <li class=""><a href="" class="" target="_blank"><span class="pcoded-micon"><i class="feather icon-trash-2"></i></span>Delete Product</a></li>--}}
                                <li class=""><a href="{{url('show/all/products')}}" class="" {{--target="_blank"--}}><span class="pcoded-micon"><i class="feather icon-calendar"></i></span>Show All Products</a></li>
                            </ul>
                        </li>
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
                            <a href="#!" class="nav-link"><span class="pcoded-mtext">Product Image</span></a>
                            <ul class="pcoded-submenu">
                                <li class="active"><a href="{{url('add/product/image')}}" class=""><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span>Add Product Image</a></li>
                                <li class=""><a href="{{url('show/all/images')}}" class=""><span class="pcoded-micon"><i class="feather icon-calendar"></i></span>Show all Images</a></li>
                            </ul>
                        </li>
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
                            <a href="#!" class="nav-link"><span class="pcoded-mtext">Product Color & Size</span></a>
                            <ul class="pcoded-submenu">
                                <li class=""><a href="{{url('add/product/color')}}" class=""><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span>Add Color & Size</a></li>
                                <li class=""><a href="{{url('show/all/colors')}}" class=""><span class="pcoded-micon"><i class="feather icon-calendar"></i></span>Show Colors & Sizes</a></li>
                            </ul>
                        </li>
                        <li class=""><a href="{{url('/add/product/brand')}}" class="">Add Brand</a></li>



                        {{--
                        <li data-username="Vertical Horizontal Box Layout RTL fixed static collapse menu color icon dark" class="nav-item pcoded-hasmenu">
                            <a href="#!" class="nav-link"><span class="pcoded-mtext">Product Size</span></a>
                            <ul class="pcoded-submenu">
                                <li class=""><a href="{{url('add/product/size')}}" class=""><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span>Add Product Size</a></li>
                                <li class=""><a href="{{url('show/all/sizes')}}" class=""><span class="pcoded-micon"><i class="feather icon-calendar"></i></span>Show all Sizes</a></li>
                            </ul>
                        </li>--}}





                       {{-- <li class=""><a href="{{url('add/product')}}" class=""><span class="pcoded-micon"><i class="feather icon-plus-circle"></i></span>Add Product</a></li>
                        <li class=""><a href="{{url('add/product/image')}}" class=""><span class="pcoded-micon"><i class="feather icon-plus"></i></span>Add Product Images</a></li>
                        <li class=""><a href="{{url('add/product/color')}}" class=""><span class="pcoded-micon"><i class="feather icon-plus"></i></span>Add Product Color</a></li>
                        <li class=""><a href="{{url('add/product/size')}}" class=""><span class="pcoded-micon"><i class="feather icon-plus"></i></span>Add Product Sizes</a></li>
                        <li class=""><a href="" class=""><span class="pcoded-micon"><i class="feather icon-upload"></i></span>Update Product</a></li>
                        <li class=""><a href="{{url('show/all/products')}}" class=""><span class="pcoded-micon"><i class="feather icon-calendar"></i></span>Show All Products</a></li>
--}}
                    </ul>

                </li>
                <li data-username="Users" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-user"></i>
                        </span>
                        <span class="pcoded-mtext">Users</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{url('/show/all/users')}}" class="">Show all Users</a></li>
                    </ul>

                </li>
                <li data-username="Orders" class="nav-item pcoded-hasmenu">
                    <a href="javascript:" class="nav-link ">
                        <span class="pcoded-micon">
                            <i class="feather icon-shopping-cart"></i></span>
                        <span class="pcoded-mtext">Orders</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=""><a href="{{url('/show/all/orders')}}" class="">All Orders</a></li>
                    </ul>

                </li>
                <li data-username="Orders" class="nav-item">
                    <a href="{{url('/messages')}}" class="">
                        <span class="pcoded-micon">
                            <i class="feather icon-mail"></i>
                        </span>
                        <span class="pcoded-mtext">Messages</span>
                    </a>
                </li>
                <li data-username="Orders" class="nav-item">
                    <a href="{{url('/send/newsletter')}}" class="">
                        <span class="pcoded-micon">
                            <i class="feather icon-paperclip"></i>
                        </span>
                        <span class="pcoded-mtext">Send Newsletter</span>
                    </a>
                </li>
                <li data-username="Orders" class="nav-item">
                    <a href="{{url('/remaining/stock')}}" class="">
                        <span class="pcoded-micon">
                            <i class="feather icon-bar-chart-2"></i>
                        </span>
                        <span class="pcoded-mtext">Stock Availability</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- [ navigation menu ] end -->