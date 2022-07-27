@extends("layout_ace.main")
@section("title", "Cart")

@section("content")
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <ul>
                    <li class="home"> <a href="/home" title="Go to Home Page">Home</a><span>&mdash;›</span></li>
                    <li class="category13"><strong> Cart </strong></li>
                </ul>
            </div>
        </div>
    </div>
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="col-main">

                @if(Session::get('cart'))

                    <div class="cart ">
                        <div class="page-title" style="margin-bottom: 10px;">

                            <h3 style="font-weight: bold; width: 67%; text-align: center; border-bottom: 1px solid lightgrey; line-height: 0.1em; margin-left: 16%; ">
                                <span style="background:#fff; padding:0 20px;">Shopping Cart</span>
                            </h3>

                        </div>
                        <div class="table-responsive">

                            <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                            <fieldset>
                                <table class="data-table cart-table" id="shopping-cart-table">
                                    <thead>
                                    <tr class="first last">
                                        <th rowspan="1">Image</th>
                                        <th rowspan="1"><span class="nobr">Product Name</span></th>
                                        <th rowspan="1">Color</th>
                                        <th rowspan="1">Size</th>
                                        <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                                        <th class="a-center" rowspan="1">Qty</th>
                                        <th colspan="1" class="a-center">Subtotal</th>
                                        <th class="a-center" rowspan="1">&nbsp;</th>
                                    </tr>
                                    </thead>

                                    <tfoot>
                                    <tr class="first last">
                                        <td class="a-right last" colspan="8">
                                            <a href="/home"><Button class="button btn-continue" title="Continue Shopping" type="button"><span><span>Continue Shopping</span></span></Button></a>
                                            <a href="/delete-to-cart/-1"><Button  class="button btn-empty" title="Clear Cart" ><span><span>Clear Cart</span></span></Button></a>
                                        </td>
                                    </tr>
                                    </tfoot>

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
                                        <tr class="first odd">
                                            <td class="image"><img width="75"  src="{{asset('/images/products/')}}/<?php try{ echo $p->image[0]->pimage; }catch (Exception $e){} ?>"></td>
                                            <td><h5 class="product-name"> {{$p->title}} </h5></td>
                                            <td class="a-center">{{$pcolor}}</td>
                                            <td class="a-center">{{$psize}}</td>
                                            <td class="a-right"><span class="cart-price"> <span class="price">{{$p->price}}</span> </span></td>
                                            <td class="a-center movewishlist">{{$ar["qty"]}}</td>
                                            <td class="a-right movewishlist"><span class="cart-price"> <span class="price"> {{$t}} </span>  </span></td>
                                            <td class="a-center last"><a class="button remove-item" title="Remove item" href="/delete-to-cart/{{$ar["psize"]}}"><span><span>Remove item</span></span></a></td>
                                        </tr>
                                    @endforeach

                                    </tbody>

                                </table>
                            </fieldset>
                        </div>
                    </div>
                    <div class="cart-collaterals row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <div class="totals">
                                <h3>Shopping Cart Total</h3>
                                <div class="inner">
                                    <table id="shopping-cart-totals-table" class="table shopping-cart-table-total">
                                        <colgroup>
                                            <col>
                                            <col width="1">
                                        </colgroup>
                                        <tfoot>
                                        <tr>
                                            <td class="a-left" colspan="1"><strong>Grand Total</strong></td>
                                            <td class="a-right"><strong><span class="price">Rs. {{$total}}</span></strong></td>
                                        </tr>
                                        </tfoot>
                                        <tbody>

                                        </tbody>
                                    </table>
                                    <ul class="checkout">
                                        <li>
                                            <a href="/checkout" style="text-decoration: none;color: #000;"><button type="button" title="Proceed to Checkout" class="button btn-proceed-checkout" onclick=""><span><span>Proceed to Checkout</span></span></button></a>
                                        </li><br>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="crosssel wow bounceInUp animated"></div>

                    @else
                    <div class="cart ">
                        <div class="page-title" style="margin-bottom: 10px;">
                            <h3 style="font-weight: bold; width: 67%; text-align: center; border-bottom: 1px solid lightgrey; line-height: 0.1em; margin-left: 16%; ">
                                <span style="background:#fff; padding:0 20px; ">Shopping Cart</span>
                            </h3>
                        </div>
                        <div class="table-responsive">

                            <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
                            <fieldset>
                                <table class="data-table cart-table" id="shopping-cart-table">
                                    <thead>
                                    <tr class="first last">
                                        <th rowspan="1">Image</th>
                                        <th rowspan="1"><span class="nobr">Product Name</span></th>
                                        <th rowspan="1">Color</th>
                                        <th rowspan="1">Size</th>
                                        <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                                        <th class="a-center" rowspan="1">Qty</th>
                                        <th colspan="1" class="a-center">Subtotal</th>
                                        <th class="a-center" rowspan="1">&nbsp;</th>
                                    </tr>
                                    </thead>

                                    <tbody>

                                    <?php
                                    $i=-1;
                                    $total = 0; ?>

                                        <tr class="first odd">
                                            <td colspan="8" class="text-center"> <h3 style="text-align: center; padding-bottom: 40px; padding-top: 20px">No items in Cart, <a href="/home" style="text-decoration: none; color: darkorange"><b>Lets Shopping</b></a></h3></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </div>
                    </div>
                @endif
        </div>
        </div>
    </section>

@endsection

