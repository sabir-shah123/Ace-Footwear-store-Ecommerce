@extends("layout_ace.main")
@section("title", "Checkout")

@section("content")

    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ul>
                    <li class="home"> <a href="/home" title="Go to Home Page">Home</a><span>&mdash;›</span></li>
                    <li class="category13"><strong> Checkout </strong></li>
                </ul>
            </div>
        </div>
    </div>
        <div class="main container" style="margin-top: 30px; " >
            <div class="col-main">
                <div class="cart " >
                    <div class="header455 table-responsive" >

                        <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                        <fieldset>
                            <div class="page-title" style="background-color: #f2f2f2; padding-top: 10px; ">
                                <h2 class="text-center" >Order Detail</h2>
                            </div>
                            <table class="data-table cart-table" id="shopping-cart-table">
                                <thead>
                                <tr class="first last">
                                    <th rowspan="1">Image</th>
                                    <th rowspan="1"><span class="nobr">Product Name</span></th>
                                    <th rowspan="1">Color</th>
                                    <th rowspan="1">Size</th>
                                    <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                                    <th class="a-center" rowspan="1">Qty</th>
                                    <th colspan="1" class="a-center">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $i=-1;
                                $total = 0; ?>
                                @foreach(Session::get('cart') as $ar)
                                    <?php
                                    $p  = App\Product::findOrFail($ar["id"]);
                                    $c = App\ProductColor::findOrFail($ar["psize"]);
                                    $pcolor =$c->pcolor;
                                    $psize = $c->psize;
                                    $t = $p->price*$ar["qty"];
                                    $total +=$t ;
                                    $i++?>
                                    <tr class="first odd" style="background-color: #f2f2f2">
                                        <td class="image"><img width="75"  src="{{asset('/images/products/')}}/<?php try{ echo $p->image[0]->pimage; }catch (Exception $e){} ?>"></td>
                                        <td><h5 class="product-name"> {{$p->title}} </h5></td>
                                        <td class="a-center">{{$pcolor}}</td>
                                        <td class="a-center">{{$psize}}</td>
                                        <td class="a-right"><span class="cart-price"> <span class="price">{{$p->price}}</span> </span></td>
                                        <td class="a-center movewishlist">{{$ar["qty"]}}</td>
                                        <td class="a-right movewishlist"><span class="cart-price"> <span class="price"> {{$t}} </span>  </span></td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </fieldset>
                        <div class="page-title" style="background-color: #f2f2f2; padding-top: 5px; margin-bottom: -15px; ">
                            <span style="font-size: 15px; text-align: right"><b>Grand Total :  {{$total}}</b></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="main-container col2-right-layout">
        <div class="main container"style=" margin-bottom: 90px;">
            <div class="row">
                <section class="col-main col-sm-9 ">
                    <div class="page-title">
                        <h2 style="margin-top: 20px; margin-bottom: 10px;">Shipping Address</h2>
                    </div>
                    <div class="static-contain">

                        @if(Auth::check())
                        <form method="post" id="signupForm" action="/proceedcheckout">
                            @csrf
                            <input type="hidden" name="total_p" value="{{ $total ?? 0 }}">
                            <fieldset class="group-select">
                                <ul>
                                        <fieldset>
                                            <legend>New Address</legend>
                                            <ul>
                                                <li>
                                                    <div class="customer-name">
                                                        <div class="input-box name-firstname">
                                                            <label >Name <span class="required">*</span></label>
                                                            <br>
                                                            <input type="text" name="name" value="{{Auth::user()->name}}" title="Name" class="input-text" required>
                                                        </div>
                                                        <div class="input-box name-lastname">
                                                            <label> Cell <span class="required">*</span> </label>
                                                            <br>
                                                            <input type="text" id="cell" name="cell" value="{{Auth::user()->cell}}" title="Last Name" class="input-text" required>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li>
                                                    <label for="billing:street1">Address <span class="required">*</span></label>
                                                    <br>
                                                    <input type="text" title="Address" name="address" value="{{Auth::user()->address}}" class="input-text required-entry" required>
                                                </li>
                                                <li>
                                                    <div class="input-box">
                                                        <label>Country <span class="required">*</span></label>
                                                        <br>
                                                        <input type="text" name="country" onKeyPress="return ValidateAlpha(event);" value="{{Auth::user()->country}}" title="Country" class="input-text" required>
                                                    </div>
                                                    <div class="input-box">
                                                        <label>City <span class="required">*</span></label>
                                                        <br>
                                                        <input type="text" name="city" onKeyPress="return ValidateAlpha(event);" value="{{Auth::user()->city}}" title="City" class="input-text" required>
                                                    </div>
                                                </li>
                                                <li>
                                                    <label for="billing:street1">Postal Code <span class="required">*</span></label>
                                                    <br>
                                                    <input type="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' title="Postal Code" name="postal_code" value="{{Auth::user()->postal_code}}" class="input-text required-entry" required>
                                                </li><br>
                                                <li>
                                                    <label style="font-size: 15px;"><b><span class="required">Payment :</span></b>  Cash on Delivery</label>
                                                    <br>

                                                    <br><br>
                                                </li>
                                            </ul>
                                        </fieldset>
                                    <li>
                                        <input type="text" name="hideit" id="hideit" value="">
                                        <div class="buttons-set">
                                            <button style="width: 210px;" type="submit" title="Place Order" class="button btn-proceed-checkout"><span>Place  Order</span></button>
                                        </div>
                                    </li>
                                </ul>
                            </fieldset>
                        </form>
                            @else
                                <div class="text-center">
                                    Please login first....
                                </div>
                            @endif
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        function ValidateAlpha(evt)
        {
            var keyCode = (evt.which) ? evt.which : evt.keyCode
            if ((keyCode < 65 || keyCode > 90) && (keyCode < 97 || keyCode > 123) && keyCode != 32)

                return false;
            return true;
        }
    </script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.mask.min.js')}}"></script>
    <style>
        #signupForm label.error {
            margin-left: 10px;
            width: auto;
            color: red;
            display: inline-block;
        }

    </style>

    <script>
        $('#cell').mask("9999-9999999");

        $("#signupForm").validate({
            rules: {
                name: "required",

                postal_code: {
                    required: true,
                    minlength: 5
                },


                password: {
                    required: true,
                    minlength: 6
                },
                password_confirmation: {
                    required: true,
                    minlength: 6,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                cell: {
                    required: true,
                    minlength: 12,
                },



            },
            messages: {
                name: "Please enter your Full name",

                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                password_confirmation: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 6 characters long",
                    equalTo: "Please enter the same password as above"
                },
                cell: "Please enter 11 digit phone no#",
                address: "Please enter address",
                country: "Please enter country name",
                city: "Please enter city name",
                postal_code: "Please enter postal code",

            }
        });
    </script>
@endsection

