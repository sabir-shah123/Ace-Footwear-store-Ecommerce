@extends("layout_ace.main")
@section("title", "History")

@section("content")
    <section class="main-container col1-layout">
        <div class="main container">
            <div class="account-login">
                <div class="page-title">
                    <h3 style="font-weight: bold; width: 67%; text-align: center; border-bottom: 1px solid lightgrey; line-height: 0.1em; margin-left: 16%; ">
                        <span style="background:#fff; padding:0 20px;">Orders History</span>
                    </h3>
                </div>
                <fieldset class="col2-set">
                    <legend>Orders History</legend>
                    <fieldset>

                        <table class="data-table cart-table" id="shopping-cart-table" >
                            <thead>
                            <tr class="first last">
                                <th class="text-center">Sr#</th>
                                <th class="text-center">Order_ID</th>
                                <th class="text-center">User_ID</th>

                                <th class="text-center">Total</th>
                                <th class="text-center">Date of Order</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Shipping Address</th>
                                <th>View Detail</th>

                                <th class="text-center">Operation</th>
                            </tr>
                            </thead>
                            <tbody>
                                    <?php $i = 1;
                                    ?>
                                    @if(count($order) > 0  && !empty($order))


                                        @foreach($order as $orders)

                                            <form method="post" action="{{url('/cancel/order')}}/{{$orders->id}}">

                                                {{method_field('put')}}
                                                {{csrf_field()}}


                                            <tr>
                                                        <td>{{$i}}</td>
                                                        <td class="text-center">{{$orders->id}}</td>
                                                        <td class="text-center">{{$orders->user_id}}</td>
                                                        <td>{{$orders->total}}</td>
                                                        <td>{{$orders->order_date}}</td>
                                                        <td class="text-center"><b>{{strtoupper($orders->status)}}</b></td>
                                                        <td>{{$orders->shipping_address}}</td>
                                                        <td class="text-center">
                                                            <a  onclick="if($('#show{{$i}}').html()=='0'){$('#detail{{$i}}').show(); $('#show{{$i}}').html('1'); }else {
                                                                    $('#show{{$i}}').html('0');
                                                                    $('#detail{{$i}}').hide();
                                                                    }"  class="btn btn-icon btn-outline-success" > <span class="icon-plus"></span></a>
                                                            <div id="show{{$i}}" style="display: none">0</div>
                                                        </td>
                                                        <td>
                                                            @if($orders->status =="pending")
                                                            <button type="submit" class="btn btn-danger">Cancel Order</button>
                                                                @endif
                                                        </td>
                                                </tr>

                                                <tr id="detail{{$i}}" style="display: none;">
                                                    <td colspan="6">
                                                        <?php  $order_d = \App\OrderDetails::where('order_id' , $orders->id)->get(); ?>
                                                        <table  class="table table-striped table-styling table-columned">
                                                            <thead>
                                                            <th>Product Title</th>
                                                            <th>Color</th>
                                                            <th>Size</th>
                                                            <th>Unit Price</th>
                                                            <th>Quantity</th>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($order_d as $order_details)
                                                                <?php $name = \App\Product::where('id', $order_details->product_id)->first();
                                                                ?>

                                                                <tr>
                                                                    <td>{{$name->title}}</td>
                                                                    <?php $size = \App\ProductColor::where('id', $order_details->psize)->first(); ?>
                                                                    <td>{{$size->pcolor}}</td>
                                                                    <td> {{$size->psize}} </td>
                                                                        <td>{{$name->price}}</td>

                                                                    <td>{{$order_details->quantity}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            <?php $i++;?>
                                            </form>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="9">
                                                <h3 style="text-align: center">No Order History, <a href="/home" style="text-decoration: none; color: darkorange"><b>Lets Shopping</b></a></h3>
                                            </td>
                                        </tr>

                                    @endif
                            </tbody>
                        </table>
                    </fieldset>
                </fieldset>
            </div>
            @if(count($order) > 0  && !empty($order))
                <div class="row">
                    <div class="col-xs-9 col-sm-9 col-md-7 col-lg-5" style="background-color: #f2f2f2; padding: 5px; font-size: 15px; margin-left: 13px"><b style="color: red">Note:</b> You can Cancel the Order if the status of your order is <b>"Pending"</b></div>
                </div>
            @endif
        </div>
    </section><br><br><br><br><br>

@endsection

